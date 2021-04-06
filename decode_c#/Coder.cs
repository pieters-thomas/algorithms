using System;
using System.Collections.Generic;
using System.Text;

namespace decode
{
    public class Coder
    {
        private readonly string _codingKey;
        private StringBuilder _message;
        private const string Abc = "abcdefghijklmnopqrstuvwxyz";

        public Coder()
        {
            Console.WriteLine("Enter Key-string:");
            string key = Console.ReadLine();

            Console.WriteLine("Enter Message:");
            string message = Console.ReadLine() ?? "";

            _codingKey = key;
            _message = new StringBuilder(message);
        }

        public StringBuilder Code(bool decode = true)
        {
            int keyAt = 0;

            //make a list of all upperCase letters.
            List<int> caps = new List<int>();
            for (int i = 0; i < _message.Length; i++)
            {
                if (char.IsUpper(_message[i]))
                {
                    caps.Add(i);
                }
            }

            //set entire message to lowerCase.
            _message = new StringBuilder(_message.ToString().ToLower());

            //apply key to message.
            for (int i = 0; i < _message.Length; i++)
            {
                if (!Abc.Contains(_message[i]))
                {
                    continue;
                }

                int a = Abc.IndexOf(_message[i]);
                int b = Abc.IndexOf(_codingKey[keyAt]);
                int c;

                if (decode)
                {
                    c = a - b;
                    if (c < 0)
                    {
                        c += Abc.Length;
                    }
                }
                else
                {
                    c = a + b;
                    if (c >= Abc.Length)
                    {
                        c -= Abc.Length;
                    }
                }

                _message[i] = Abc[c];
                keyAt++;

                if (keyAt >= _codingKey.Length)
                {
                    keyAt = 0;
                }
            }

            //restore previous upperCase
            foreach (var cap in caps)
            {
                _message[cap] = char.ToUpper(_message[cap]);
            }

            return _message;
        }
    }
}
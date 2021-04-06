using System;

namespace decode
{
    class Program
    {
        static void Main(string[] args)
        {
            Display display = new Display();
            
            display.Title();
            display.Options();
            
            bool terminateApp = false;

            while (!terminateApp)
            {
                string activate = Console.ReadLine();

                switch (activate)
                {
                    case "1":

                        Coder decoder = new Coder();
                        display.Solution($"Decoded message:\r{decoder.Code(true)}\n");
                        break;

                    case "2":
                        
                        Coder encoder = new Coder();
                        display.Solution($"Encoded message:\r{encoder.Code(false)}\n");
                        break;

                    case "3":
                        terminateApp = true;
                        Console.WriteLine("\n-- Closing App --\n");
                        break;

                    default:
                        Console.WriteLine("Invalid input\n");
                        break;
                }
            }
        }
    }
}
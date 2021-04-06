using System;

namespace decode
{
    public class Display
    {
        public void Title()
        {
            Console.WriteLine("\n------------------------\r");
            Console.WriteLine("** Decoding Algorithm **\r");
            Console.WriteLine("------------------------\r");
           
        }

        public void Options()
        {
            Console.WriteLine("Enter [1] to decode");
            Console.WriteLine("Enter [2] to encode");
            Console.WriteLine("Enter [3] to quit");
            Console.WriteLine("------------------------\n");
        }
        public void Solution(string solution)
        {
            var ogColor = Console.ForegroundColor;
            Console.ForegroundColor = ConsoleColor.Green;
            Console.WriteLine(solution);
            Console.ForegroundColor = ogColor;
        }
    }
}
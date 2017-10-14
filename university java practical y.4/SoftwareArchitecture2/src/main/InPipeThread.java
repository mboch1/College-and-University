package main;

import java.io.*;

public class InPipeThread extends Thread
{
	// The writing end of the pipe
	private PipedWriter pipeIn;
	private BufferedReader input_file;
	
	InPipeThread(PipedWriter pipeIn)
	{
		this.pipeIn = pipeIn;
	}

	public void run()
	{
		try
		{
			String input;
			
			// Open the input file
			// Note: input.txt must be copied to your project folder, or use relative path, e.g. "C:/input.txt"
			FileReader file = new FileReader("input.txt");
			input_file = new BufferedReader(file);
			
			// Loop until the EOF
			while (input_file.ready())
			{
				// Read the next line from the file
				input = input_file.readLine();
				// Display the line
				System.out.println(input + "\n");
				// Write the line to the pipe
				pipeIn.write(input + "\n");
				// Flush the pipe (pushes the data through)
				pipeIn.flush();
			}
			// Input file empty, write terminate program
		}
		catch (FileNotFoundException fnf)
		{
			System.err.println("File not found");
			System.err.println(fnf.getMessage());
			System.exit(-1);
		}
		catch (IOException ioe)
		{
			System.err.println("Error during I/O");
			System.err.println(ioe.getMessage());
			System.exit(-1);
		}
	}
}

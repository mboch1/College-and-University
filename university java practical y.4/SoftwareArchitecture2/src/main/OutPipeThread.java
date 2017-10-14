package main;

import java.io.*;

public class OutPipeThread extends Thread
{
	PipedReader pipeOut;
	private PrintWriter output_file;
	
	OutPipeThread(PipedReader pipeOut)
	{
		this.pipeOut = pipeOut;
	}
	
	public void run()
	{
		try
		{
			// Put a buffer on the pipe.  Enables String reading
			BufferedReader bufferedPipe = new BufferedReader(pipeOut);
			
			// Create the output file
			// Note: the output.txt will be created in your project folder
			FileWriter file = new FileWriter("output.txt");
			output_file = new PrintWriter(file);
			
			// Loop forever.  The exception will exit the program
			while (true)
			{
				// Read a line from the pipe
				String line = bufferedPipe.readLine();
				// Display the line
				System.out.println("O/P Pipe: " + line);
				// Convert the line to upper case and write it to file
				output_file.write(line.toUpperCase() + "\n");
				// Flush the data to the file
				output_file.flush();
			}
		}
		catch (IOException ioe)
		{
			// Do nothing.  This will occur during the I/O operation
		}
	}
}

package main;

import java.io.*;

public class Pipe 
{
	public static void main(String[] args)
	{
		try
		{
			// Create the pipe
			PipedReader pipeOut = new PipedReader(1);
			PipedWriter pipeIn = new PipedWriter(pipeOut);
			
			// Create the two threads
			InPipeThread t1 = new InPipeThread(pipeIn);
			OutPipeThread t2 = new OutPipeThread(pipeOut);
			
			// Start the threads
			t1.start();
			t2.start();
		}
		catch (IOException ioe)
		{
			System.err.println("Error in I/O");
			System.err.println(ioe.getMessage());
			System.exit(-1);
		}
	}
}

package kwic;

import java.io.*;

public class KWICPipe 
{
	public static void main(String[] args)
	{
		try
		{
			// We need two pipes, A and B
			PipedReader pipeOutA = new PipedReader();
			PipedWriter pipeInA = new PipedWriter(pipeOutA);
			PipedReader pipeOutB = new PipedReader();
			PipedWriter pipeInB = new PipedWriter(pipeOutB);
			// Create the three filters
			ReadLineThread read = new ReadLineThread(pipeInA);
			ShiftLineThread shift = new ShiftLineThread(pipeOutA, pipeInB);
			SortLinesThread sort = new SortLinesThread(pipeOutB);
			
			// Start the threads
			read.start();
			shift.start();
			sort.start();
		}
		catch (IOException ioe)
		{
			System.err.println("Error during I/O");
			System.err.println(ioe.getMessage());
			System.exit(-1);
		}
	}
}

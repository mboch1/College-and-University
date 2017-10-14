package diy;

import java.io.*;

public class ThreeToEightConverter 
{
	public static void main(String[] args)
	{
		try
		{
			// Create three pipes
			// PipeA
			PipedInputStream pipeInA = new PipedInputStream();
			PipedOutputStream pipeOutA = new PipedOutputStream(pipeInA);
			// PipeB
			PipedInputStream pipeInB = new PipedInputStream();
			PipedOutputStream pipeOutB = new PipedOutputStream(pipeInB);
			// PipeC
			PipedInputStream pipeInC = new PipedInputStream();
			PipedOutputStream pipeOutC = new PipedOutputStream(pipeInC);
			
			// Create the four filters
			ReadFileFilter readFile = new ReadFileFilter(pipeOutA);
			ConvertToIntFilter convertInt = new ConvertToIntFilter(pipeInA, pipeOutB);
			ConvertToEightFilter convertEight = new ConvertToEightFilter(pipeInB, pipeOutC);
			DisplayFilter display = new DisplayFilter(pipeInC);
			
			// Start the four filters
			readFile.start();
			convertInt.start();
			convertEight.start();
			display.start();
		}
		catch (IOException ioe)
		{
			System.err.println("Error in I/O");
			System.err.println(ioe.getMessage());
			System.exit(-1);
		}
	}
}

package diy;

import java.io.*;

public class ConvertToEightFilter extends Thread
{
	// The pipe coming in from the ConvertToIntFilter
	private PipedInputStream pipeIn;
	// The pipe going out to the DisplayFilter
	private PipedOutputStream pipeOut;
	
	public ConvertToEightFilter(PipedInputStream pipeIn, PipedOutputStream pipeOut)
	{
		this.pipeIn = pipeIn;
		this.pipeOut = pipeOut;
	}
	
	public void run()
	{
		try
		{
			// The ConvertToIntFilter is sending us primitive ints.  Therefore we use 
			// a DataInputStream
			DataInputStream int_in = new DataInputStream(pipeIn);
			// The DisplayFilter is expecting objects (int[]).  Therefore we use an
			// ObjectOutputStream
			ObjectOutputStream object_out = new ObjectOutputStream(pipeOut);
			
			// Read in an int
			int read = int_in.readInt();
			
			// Loop until the termination signal (-1) is received.
			while (read != -1)
			{
				// Create a new eight array
				int[] eight = new int[8];
				// Fill the array
				for (int i = 0; i < 8; i++)
				{
					eight[i] = read;
					read = int_in.readInt();
				}
				// Send the array to the DisplayFilter
				object_out.writeObject(eight);
				// Push the data through
				object_out.flush();
			}
			// Termination signal received.  Send termination to the DisplayFilter
			object_out.writeObject(null);
			// Push the data through
			object_out.flush();
		}
		catch (IOException ioe)
		{
			System.err.println("Error in I/O");
			System.err.println(ioe.getMessage());
			System.exit(-1);
		}
	}
}

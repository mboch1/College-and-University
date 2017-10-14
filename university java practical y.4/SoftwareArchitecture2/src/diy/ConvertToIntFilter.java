package diy;

import java.io.*;

public class ConvertToIntFilter extends Thread
{
	// The pipe coming in from the ReadFileFilter
	private PipedInputStream pipeIn;
	// The pipe going to the ConvertToEightFilter
	private PipedOutputStream pipeOut;
	
	public ConvertToIntFilter(PipedInputStream pipeIn, PipedOutputStream pipeOut)
	{
		this.pipeIn = pipeIn;
		this.pipeOut = pipeOut;
	}
	
	public void run()
	{
		try
		{
			// The ReadFileFilter is sending us objects (int[]).  Therefore we 
			// must use an ObjectInputStream
			ObjectInputStream object_in = new ObjectInputStream(pipeIn);
			// The ConvertToEightFilter expects primitive integers.  Therefore we
			// we use a DataOutputStream
			DataOutputStream int_out = new DataOutputStream(pipeOut);
			
			// Read in the first int[]
			int[] ints = (int[])object_in.readObject();
			
			// While the termination signal (null) is not sent
			while (ints != null)
			{
				// Foreach int in the array
				for (int i = 0; i < ints.length; i++)
				{
					// Write the int to the ConvertToEightFilter
					int_out.writeInt(ints[i]);
					// Push the data through
					int_out.flush();
				}
				// Read in the next int[]
				ints = (int[])object_in.readObject();
			}
			// The termination signal has been received.  Send our termination 
			// signal (-1)
			int_out.writeInt(-1);
			// Push the data through
			int_out.flush();
		}
		catch (IOException ioe)
		{
			System.err.println("Error in I/O");
			System.err.println(ioe.getMessage());
			System.exit(-1);
		}
		catch (ClassNotFoundException cnf)
		{
			System.err.println("Unexpected object in input stream");
			System.err.println(cnf.getMessage());
			System.exit(-1);
		}
	}
}

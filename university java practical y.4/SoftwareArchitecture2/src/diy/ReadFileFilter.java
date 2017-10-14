package diy;

import java.io.*;

public class ReadFileFilter extends Thread
{
	// The pipe connected to the ConvertToIntFilter
	private PipedOutputStream pipeOut;
	private ObjectInputStream input_file;
	
	public ReadFileFilter(PipedOutputStream pipeOut)
	{
		this.pipeOut = pipeOut;
	}
	
	public void run()
	{
		try
		{
			// Open the file
			// Note: three.dat must be copied to your project folder, or use relative path, e.g. "C:/three.dat"
			FileInputStream file = new FileInputStream("three.dat");
			input_file = new ObjectInputStream(file);
			// We are sending objects (int[]) to the ConvertToIntFilter, so we use
			// ObjectOutputStream
			ObjectOutputStream object_out = new ObjectOutputStream(pipeOut);
			
			// Loop until the file is empty
			while(file.available() > 0)
			{
				// Read in the next object from the file
				Object obj = input_file.readObject();
				// Write the object to the ConvertToIntFilter
				object_out.writeObject(obj);
				// Push the data through
				object_out.flush();
			}
			// File is empty.  Send termination signal (null)
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
		catch (ClassNotFoundException cnf)
		{
			System.err.println("Unexpected class in file");
			System.err.println(cnf.getMessage());
			System.exit(-1);
		}
	}
}

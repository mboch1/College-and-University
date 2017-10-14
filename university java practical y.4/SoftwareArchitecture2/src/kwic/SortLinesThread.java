package kwic;

import java.util.*;
import java.io.*;

public class SortLinesThread extends Thread
{
	private PipedReader pipeOut;
	ArrayList<String> kwicList = new ArrayList<String>();
	
	SortLinesThread(PipedReader pipeOut)
	{
		this.pipeOut = pipeOut;
	}
	
	public void run()
	{
		try
		{
			// The incoming data on the pipe is in string form.  Easiest method
			// is to use a buffered pipe
			BufferedReader bufferedPipe = new BufferedReader(pipeOut);
			
			// Loop until no data is left on the pipe.  The other end will close 
			// the pipe automatically, causing an exception to be thrown
			while (true)
			{
				// Read the next line from the pipe
				String line = bufferedPipe.readLine();
				// Add the line to the list
				kwicList.add(line);
			}
		}
		catch (IOException ioe)
		{
			// This is expected. When the pipe is empty an IOException occurs
		}
		
		// We have received all messages.  Sort the list
		Collections.sort(kwicList);
		
		// Display the sorted lines
		for (int i = 0; i < kwicList.size(); i++)
			System.out.println(kwicList.get(i));
	}
}

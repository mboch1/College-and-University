package kwic;

import java.io.*;
import java.util.StringTokenizer;

public class ShiftLineThread extends Thread
{
	private PipedReader pipeOut;
	private PipedWriter pipeIn;
	
	ShiftLineThread(PipedReader pipeOut, PipedWriter pipeIn)
	{
		this.pipeOut = pipeOut;
		this.pipeIn = pipeIn;
	}
	
	public void run()
	{
		try
		{
			// The incoming pipe will send strings.  Simplest method is to buffer the pipe.
			BufferedReader bufferedPipe = new BufferedReader(pipeOut);
			
			// We loop forever.  When no data is left on the pipe, the opposite end will 
			// close it, causing an IOException which is caught
			while (true)
			{
				// Read the next line
				String line = bufferedPipe.readLine();
				
				// Use the StringTokenizer to turn the read line into 
				// its individual elements.
				StringTokenizer tokenizer = new StringTokenizer(line, " .,;:()");
				
				// Create an array to store all the elements in.  The 
				// size of the array is the number of tokens in the tokenizer.
				String[] tokens = new String[tokenizer.countTokens()];
				
				// Now read the tokens into the array
				for (int i = 0; tokenizer.hasMoreTokens(); i++)
					tokens[i] = tokenizer.nextToken();
				
				// Time to shift the line.  We do this as many times as there are 
				// tokens, as this is the number of combinations of shifted words.
				//
				// Example:
				// the quick brown fox jumped over the lazy dog
				// 
				// This becomes:
				// the quick brown fox jumped over the lazy dog
				// quick brown fox jumped over the lazy dog the
				// brown fox jumped over the lazy dog the quick
				// fox jumped over the lazy dog the quick brown
				// etc.
				for (int tokenCount = 0; tokenCount < tokens.length; tokenCount++)
				{
					// This is the string we will store the shifted line in
					String temp = "";
					
					// Start the shifted line from 0, then 1, 2 ...
					int index = tokenCount;
					
					// Now ensure we use all the tokens
					for (int i = 0; i < tokens.length; i++)
					{
						// The index will eventually become greater than 
						// the size of the token array.  For example, consider:
						//
						// the quick brown fox jumped over the lazy dog
						// 
						// Second iteration starts at quick, so goes 1, 2, .. 8, 0
						// Third starts at brown and goes 2, 3, .. 8, 0, 1
						// etc.
						if (index >= tokens.length)
							index = 0;
						
						// Concatenate current shifted line with the next token
						temp = temp + tokens[index] + " ";
						// Increment the index to use the next token
						index++;
					}
					
					// Write the shifted line to the pipe
					pipeIn.write(temp + "\n");
					// Push the data through
					pipeIn.flush();
				}
			}
		}
		catch (IOException ioe)
		{
			// This will occur when the pipe is empty.  No need to throw an exception
		}
	}
}

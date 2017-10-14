package dataTSP;
//version 1 created on 21/10/2016, using given code
//student id: 40270585
//make sure that the data files are placed inside the project root folder!
//this class is reading points from a textfile and writing them to the arraylist

import java.awt.geom.Point2D;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;

public class TSPSolution 
{
	public static ArrayList<Point2D> loadTSPLib(String fName)
	{
		//Load in a TSPLib instance. This example assumes that the Edge weight type
		//is EUC_2D.
		//It will work for examples such as rl5915.tsp Other files such as
		//fri26.tsp .To use a different format, you will have to
		//modify the this code
		
		ArrayList<Point2D> result = new ArrayList<Point2D>();
		
		BufferedReader br = null;
		try 
		{
			String currentLine;
			int dimension =0;//Hold the dimension of the problem
			boolean readingNodes = false;
			
			br = new BufferedReader(new FileReader(fName));
				
			while ((currentLine = br.readLine()) != null) 
			{
				//Read the file until the end;
				if (currentLine.contains("EOF"))
				{
					//EOF should be the last line
					readingNodes = false;
					//Finished reading nodes
					if (result.size() != dimension)
					{
						//Check to see if the expected number of cities have been loaded
						System.out.println("Error loading cities");
						System.exit(-1);
					}
				}
				
				if (readingNodes)
				{
					//If reading in the node data
					String[] tokens = currentLine.split(" ");
					//Split the line by spaces.
					//tokens[0] is the city id and not needed in this example
					float x = Float.parseFloat(tokens[1].trim());
					float y = Float.parseFloat(tokens[2].trim());
					//Use Java's built in Point2D type to hold a city
					Point2D city = new Point2D.Float(x,y);
					//Add this city into the array list
					result.add(city);
				}
				
				if (currentLine.contains("DIMENSION"))
				{
					//Note the expected problem dimension (number of cities)
					String[] tokens = currentLine.split(":");
					dimension = Integer.parseInt(tokens[1].trim());
				}
				
				if (currentLine.contains("NODE_COORD_SECTION"))
				{
					//Node data follows this line
					readingNodes = true;
				}
			}
		} 
		catch (IOException e) 
		{
			e.printStackTrace();
		} 
		finally 
		{
			try 
			{
				if (br != null)br.close();
			} 
			catch (IOException ex) 
			{
				ex.printStackTrace();
			}
		}
		
	return result;
	}
	
	//this is not solving the TSP! it just gives a total length of the routes calculated without looking at the actual nearest 2 points on the list!
	public static double routeLength(ArrayList<Point2D> cities)
	{
		//Calculate the length of a TSP route held in an ArrayList as a set of Points
		double result=0;//Holds the route length
		Point2D prev = cities.get(cities.size()-1);
		//Set the previous city to the last city in the ArrayList as we need to measure the length of the entire loop
		for(Point2D city : cities)
		{
			//Go through each city in turn
			result += city.distance(prev);
			//get distance from the previous city
			prev = city;
			//current city will be the previous city next time
		}
		
		return result;
	}

}

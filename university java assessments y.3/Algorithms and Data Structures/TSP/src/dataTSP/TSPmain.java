package dataTSP;
//version 3 created on 21/10/2016
//student id: 40270585
//make sure that data files are placed inside the project root folder!

import java.awt.geom.Point2D;
import java.time.Duration;
import java.time.Instant;
import java.util.ArrayList;
import java.util.Scanner;

import javax.swing.JFrame;

public class TSPmain
{

	public static void main(String[] args) 
	{	
		//choose filename
		String filename = "";
		Scanner sc = new Scanner(System.in);
		System.out.println("This is algorithm solving travelling salesman problem.");
		System.out.println("Please choose the file from the list below by typing its name (name.tsp) and press enter:");
		System.out.println("Files are ordered descending, by the number of cities present.");
		System.out.println("rl11849.tsp, rl5915.tsp, fl1400.tsp,  d198.tsp, att48.tsp");
		filename = sc.next();
		sc.close();
		
		//use later to identify the graph scale
		int xmax=0;
		int ymax=0;
		int scale=0;
		//read choosen file and save city location details to arraylist
		ArrayList<Point2D> cityList = TSPSolution.loadTSPLib(filename);
		
		//find max value of x and y in the array list for later use in setting up the scale of the graph
		for(int i=0; i<cityList.size(); i++)
		{
			if(cityList.get(i).getX()>xmax)
			{
				xmax=(int)cityList.get(i).getX();
			}
			if(cityList.get(i).getY()>ymax)
			{
				ymax=(int)cityList.get(i).getY();
			}
		}
		
		//an average of two furtherest values should produce reasonable scale for the graph
		scale = xmax+ymax/2;
		
		if(!cityList.isEmpty())
		{
			System.out.println("Cities loaded to array successfully, proceeding...");
			System.out.println("Graph scale set to: "+scale+" proceeding...");
		}

		//create new TSPAlgorithm object and assign the loaded array cityList to it
		TSPAlgorithm nearest_neighbour = new TSPAlgorithm(cityList);
		
		//measure method execution time from here:
		Instant start = Instant.now();
		//creates a new, sorted journey
		ArrayList<Point2D> journey = nearest_neighbour.TSPNN(cityList);
		//stop measurement
		Instant end = Instant.now();
		System.out.println("TSPAlgorithm duration time (0.000s): "+Duration.between(start, end));
		
		//create new frame for displaying the graph
		JFrame frame = new JFrame();
		frame.setSize(1280, 960);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		//this class can be fed with any solution in form of Point2D arraylist to draw a journey graph
		TSPDrawGraph can1 = new TSPDrawGraph(journey, scale);
		frame.add(can1);
		frame.setVisible(true);
	}

}

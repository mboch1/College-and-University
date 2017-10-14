package dataTSP;
//version 1 created on 22/10/2016
//student id: 40270585
//this class contains a solution algorithm for TSP
import java.util.ArrayList;
import java.awt.geom.Point2D;

public class TSPAlgorithm 
{
	//initial arraylist containing all the cities to be visited
	private ArrayList <Point2D> cities = new ArrayList<>();
	//this will be the result after sorting it by the algorithm
	private ArrayList <Point2D> trip = new ArrayList<>();
	
	//create constructor to ensure that the city list is forwarded
	TSPAlgorithm(ArrayList<Point2D> citylist)
	{
		cities.addAll(citylist);
	}
	
	//nearest neighbour algorithm method
	public ArrayList<Point2D> TSPNN (ArrayList<Point2D> cities)
	{
		//starting point, can be upgraded later to prompt user to input the starting city
		Point2D currentCity = cities.remove(0);		
		//position of the closest city on the arraylist
		int index = 0;
		//create first shortest distance for the later use
		//make it very high thus it will always be replaced in the step 1
		//checked the tested files, none contains value higher than min_dist 
		double min_dist = 999999999;
		double journey_length = 0;
		//do while array is not empty
		while(cities.size()>0)
		{
			trip.add(currentCity);
			
			//search through the remaining cities for nearest neighbour
			for(int i=0; i<cities.size(); i++)
			{
				//get distance between compared cities
				double dist = (double) currentCity.distance(cities.get(i));
				//lesser than, will look for the first closest city from the list 
				//may cause worthy considering issues if there are 2 closest cities
				if(dist<min_dist)
				{
					min_dist=dist;
					index = i;
				}
				
			}
			//add closest city to the list
			trip.add(cities.get(index));
			//remove closest city from the cities array and add is as the next city
			currentCity=cities.remove(index);
			journey_length = journey_length + min_dist;
			//reset for loop values
			index = 0;
			min_dist= 999999999;
			
		}
		//returns a sorted array and measured total distance:
		System.out.println("Total distance travelled: "+journey_length);
		return trip;
	}	
}

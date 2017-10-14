package dataTSP;
//version 5 created on 22/10/2016
//student id: 40270585
//this class is drawing cities and "roads" between them based on solution arraylist

import java.awt.*;
import java.awt.geom.Point2D;
import java.util.ArrayList;

public class TSPDrawGraph extends Canvas
{
	private static final long serialVersionUID = 1L;
	private ArrayList <Point2D> locations = new ArrayList<>();
	private int res_scale;
	
	public TSPDrawGraph(ArrayList<Point2D> cityList, int scale) 
	{
		locations.addAll(cityList);
		res_scale=scale;
	}

	//override canvas method
	public void paint(Graphics g)
	{
		g.setColor(Color.LIGHT_GRAY);
		//using default width and height of frame
		g.fillRect(0, 0, 1280, 960);
		
		//draw cities and roads between them
		paintCities(g, locations);
		paintRoads(g, locations);	
	}
	
	//draw cities using locations
	private void paintCities(Graphics g, ArrayList<Point2D>locations)
	{
		g.setColor(Color.BLACK);
		//assume position 0 is a starting position
		//Point2D start = locations.get(0);
		//iterate through the list of cities and paint them on canvas
		for(Point2D i: locations)
		{
			//since pixels can't have floating points values, cast them to int
			int x = (int) ((i.getX()/res_scale)*getHeight());
			int y = (int) ((i.getY()/res_scale)*getHeight());
			g.fillOval(x, y, 2, 2);
		}
		
	}
	
	//draw roads
	private void paintRoads(Graphics g, ArrayList<Point2D>locations)
	{
		g.setColor(Color.RED);
		//iterate through the list of cities and paint the roads on canvas
		for(int r=0; r<locations.size()-1; r++)
		{
			int x1 = (int) ((locations.get(r).getX()/res_scale)*getHeight());
			int y1 = (int) ((locations.get(r).getY()/res_scale)*getHeight());
			int x2 = (int) ((locations.get(r+1).getX()/res_scale)*getHeight());
			int y2 = (int) ((locations.get(r+1).getY()/res_scale)*getHeight());
			//creates a line - road between 2 cities
			g.drawLine(x1, y1, x2, y2);
		}
	}
}

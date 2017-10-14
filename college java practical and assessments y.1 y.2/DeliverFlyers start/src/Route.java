import becker.robots.*;
import java.awt.Color;

public class Route extends City
{
	public Route()
	{	super(12, 12);
		this.placeHouses();
		//this.paveRoads();
		this.plantGrass();
	}
	
	private void placeHouses()
	{	new House(this, 1, 0);
		new House(this, 1, 1);
		new House(this, 2, 1);
		new House(this, 3, 1);
		new House(this, 4, 1);
		new House(this, 4, 0);
		new House(this, 7, 0);
		new House(this, 7, 1);
		new House(this, 8, 1);
		new House(this, 9, 1);
		new House(this, 10, 1);
		new House(this, 10, 0);


		new House(this, 1, 5);
		new House(this, 1, 4);
		new House(this, 2, 4);
		new House(this, 3, 4);
		new House(this, 4, 4);
		new House(this, 4, 5);
		new House(this, 7, 5);
		new House(this, 7, 4);
		new House(this, 8, 4);
		new House(this, 9, 4);
		new House(this, 10, 4);
		new House(this, 10, 5);
		
		new House(this, 1, 6);
		new House(this, 1, 7);
		new House(this, 2, 7);
		new House(this, 3, 7);
		new House(this, 4, 7);
		new House(this, 4, 6);
		new House(this, 7, 6);
		new House(this, 7, 7);
		new House(this, 8, 7);
		new House(this, 9, 7);
		new House(this, 10, 7);
		new House(this, 10, 6);


		new House(this, 1, 11);
		new House(this, 1, 10);
		new House(this, 2, 10);
		new House(this, 3, 10);
		new House(this, 4, 10);
		new House(this, 4, 11);
		new House(this, 7, 11);
		new House(this, 7, 10);
		new House(this, 8, 10);
		new House(this, 9, 10);
		new House(this, 10, 10);
		new House(this, 10, 11);
	}
	
	private void plantGrass()
	{	
		this.getIntersection(1,0).setIcon(new YardIcon());
		this.getIntersection(2,0).setIcon(new YardIcon());
		this.getIntersection(3,0).setIcon(new YardIcon());
		this.getIntersection(4,0).setIcon(new YardIcon());
		
		this.getIntersection(7,0).setIcon(new YardIcon());
		this.getIntersection(8,0).setIcon(new YardIcon());
		this.getIntersection(9,0).setIcon(new YardIcon());
		this.getIntersection(10,0).setIcon(new YardIcon());
		
		this.getIntersection(1,1).setIcon(new YardIcon());
		this.getIntersection(2,1).setIcon(new YardIcon());
		this.getIntersection(3,1).setIcon(new YardIcon());
		this.getIntersection(4,1).setIcon(new YardIcon());
		
		this.getIntersection(7,1).setIcon(new YardIcon());
		this.getIntersection(8,1).setIcon(new YardIcon());
		this.getIntersection(9,1).setIcon(new YardIcon());
		this.getIntersection(10,1).setIcon(new YardIcon());
		
		
		this.getIntersection(1,4).setIcon(new YardIcon());
		this.getIntersection(2,4).setIcon(new YardIcon());
		this.getIntersection(3,4).setIcon(new YardIcon());
		this.getIntersection(4,4).setIcon(new YardIcon());
		
		this.getIntersection(7,4).setIcon(new YardIcon());
		this.getIntersection(8,4).setIcon(new YardIcon());
		this.getIntersection(9,4).setIcon(new YardIcon());
		this.getIntersection(10,4).setIcon(new YardIcon());
		
		this.getIntersection(1,5).setIcon(new YardIcon());
		this.getIntersection(2,5).setIcon(new YardIcon());
		this.getIntersection(3,5).setIcon(new YardIcon());
		this.getIntersection(4,5).setIcon(new YardIcon());
		
		this.getIntersection(7,5).setIcon(new YardIcon());
		this.getIntersection(8,5).setIcon(new YardIcon());
		this.getIntersection(9,5).setIcon(new YardIcon());
		this.getIntersection(10,5).setIcon(new YardIcon());
		
		this.getIntersection(1,6).setIcon(new YardIcon());
		this.getIntersection(2,6).setIcon(new YardIcon());
		this.getIntersection(3,6).setIcon(new YardIcon());
		this.getIntersection(4,6).setIcon(new YardIcon());
		
		this.getIntersection(7,6).setIcon(new YardIcon());
		this.getIntersection(8,6).setIcon(new YardIcon());
		this.getIntersection(9,6).setIcon(new YardIcon());
		this.getIntersection(10,6).setIcon(new YardIcon());
		
		this.getIntersection(1,7).setIcon(new YardIcon());
		this.getIntersection(2,7).setIcon(new YardIcon());
		this.getIntersection(3,7).setIcon(new YardIcon());
		this.getIntersection(4,7).setIcon(new YardIcon());
		
		this.getIntersection(7,7).setIcon(new YardIcon());
		this.getIntersection(8,7).setIcon(new YardIcon());
		this.getIntersection(9,7).setIcon(new YardIcon());
		this.getIntersection(10,7).setIcon(new YardIcon());
		
		this.getIntersection(1,10).setIcon(new YardIcon());
		this.getIntersection(2,10).setIcon(new YardIcon());
		this.getIntersection(3,10).setIcon(new YardIcon());
		this.getIntersection(4,10).setIcon(new YardIcon());
		
		this.getIntersection(7,10).setIcon(new YardIcon());
		this.getIntersection(8,10).setIcon(new YardIcon());
		this.getIntersection(9,10).setIcon(new YardIcon());
		this.getIntersection(10,10).setIcon(new YardIcon());
		
		this.getIntersection(1,11).setIcon(new YardIcon());
		this.getIntersection(2,11).setIcon(new YardIcon());
		this.getIntersection(3,11).setIcon(new YardIcon());
		this.getIntersection(4,11).setIcon(new YardIcon());
		
		this.getIntersection(7,11).setIcon(new YardIcon());
		this.getIntersection(8,11).setIcon(new YardIcon());
		this.getIntersection(9,11).setIcon(new YardIcon());
		this.getIntersection(10,11).setIcon(new YardIcon());
	}
	
	private void paveRoads()
	{
		this.getIntersection(0, 0).setColor(Color.GRAY);
		this.getIntersection(0, 1).setColor(Color.GRAY);
		this.getIntersection(0, 2).setColor(Color.GRAY);
		this.getIntersection(0, 3).setColor(Color.GRAY);
		this.getIntersection(0, 4).setColor(Color.GRAY);
		this.getIntersection(0, 5).setColor(Color.GRAY);
		this.getIntersection(0, 6).setColor(Color.GRAY);
		this.getIntersection(0, 7).setColor(Color.GRAY);
		this.getIntersection(0, 8).setColor(Color.GRAY);
		this.getIntersection(0, 9).setColor(Color.GRAY);
		this.getIntersection(0, 10).setColor(Color.GRAY);
		this.getIntersection(0, 11).setColor(Color.GRAY);

		this.getIntersection(1, 2).setColor(Color.GRAY);
		this.getIntersection(1, 3).setColor(Color.GRAY);
		this.getIntersection(1, 8).setColor(Color.GRAY);
		this.getIntersection(1, 9).setColor(Color.GRAY);

		this.getIntersection(2, 2).setColor(Color.GRAY);
		this.getIntersection(2, 3).setColor(Color.GRAY);
		this.getIntersection(2, 8).setColor(Color.GRAY);
		this.getIntersection(2, 9).setColor(Color.GRAY);

		this.getIntersection(3, 2).setColor(Color.GRAY);
		this.getIntersection(3, 3).setColor(Color.GRAY);
		this.getIntersection(3, 8).setColor(Color.GRAY);
		this.getIntersection(3, 9).setColor(Color.GRAY);

		this.getIntersection(4, 2).setColor(Color.GRAY);
		this.getIntersection(4, 3).setColor(Color.GRAY);
		this.getIntersection(4, 8).setColor(Color.GRAY);
		this.getIntersection(4, 9).setColor(Color.GRAY);

		this.getIntersection(5, 0).setColor(Color.GRAY);
		this.getIntersection(5, 1).setColor(Color.GRAY);
		this.getIntersection(5, 2).setColor(Color.GRAY);
		this.getIntersection(5, 3).setColor(Color.GRAY);
		this.getIntersection(5, 4).setColor(Color.GRAY);
		this.getIntersection(5, 5).setColor(Color.GRAY);
		this.getIntersection(5, 6).setColor(Color.GRAY);
		this.getIntersection(5, 7).setColor(Color.GRAY);
		this.getIntersection(5, 8).setColor(Color.GRAY);
		this.getIntersection(5, 9).setColor(Color.GRAY);
		this.getIntersection(5, 10).setColor(Color.GRAY);
		this.getIntersection(5, 11).setColor(Color.GRAY);

		this.getIntersection(6, 0).setColor(Color.GRAY);
		this.getIntersection(6, 1).setColor(Color.GRAY);
		this.getIntersection(6, 2).setColor(Color.GRAY);
		this.getIntersection(6, 3).setColor(Color.GRAY);
		this.getIntersection(6, 4).setColor(Color.GRAY);
		this.getIntersection(6, 5).setColor(Color.GRAY);
		this.getIntersection(6, 6).setColor(Color.GRAY);
		this.getIntersection(6, 7).setColor(Color.GRAY);
		this.getIntersection(6, 8).setColor(Color.GRAY);
		this.getIntersection(6, 9).setColor(Color.GRAY);
		this.getIntersection(6, 10).setColor(Color.GRAY);
		this.getIntersection(6, 11).setColor(Color.GRAY);

		this.getIntersection(7, 2).setColor(Color.GRAY);
		this.getIntersection(7, 3).setColor(Color.GRAY);
		this.getIntersection(7, 8).setColor(Color.GRAY);
		this.getIntersection(7, 9).setColor(Color.GRAY);

		this.getIntersection(8, 2).setColor(Color.GRAY);
		this.getIntersection(8, 3).setColor(Color.GRAY);
		this.getIntersection(8, 8).setColor(Color.GRAY);
		this.getIntersection(8, 9).setColor(Color.GRAY);

		this.getIntersection(9, 2).setColor(Color.GRAY);
		this.getIntersection(9, 3).setColor(Color.GRAY);
		this.getIntersection(9, 8).setColor(Color.GRAY);
		this.getIntersection(9, 9).setColor(Color.GRAY);

		this.getIntersection(10, 2).setColor(Color.GRAY);
		this.getIntersection(10, 3).setColor(Color.GRAY);
		this.getIntersection(10, 8).setColor(Color.GRAY);
		this.getIntersection(10, 9).setColor(Color.GRAY);

		this.getIntersection(11, 0).setColor(Color.GRAY);
		this.getIntersection(11, 1).setColor(Color.GRAY);
		this.getIntersection(11, 2).setColor(Color.GRAY);
		this.getIntersection(11, 3).setColor(Color.GRAY);
		this.getIntersection(11, 4).setColor(Color.GRAY);
		this.getIntersection(11, 5).setColor(Color.GRAY);
		this.getIntersection(11, 6).setColor(Color.GRAY);
		this.getIntersection(11, 7).setColor(Color.GRAY);
		this.getIntersection(11, 8).setColor(Color.GRAY);
		this.getIntersection(11, 9).setColor(Color.GRAY);
		this.getIntersection(11, 10).setColor(Color.GRAY);
		this.getIntersection(11, 11).setColor(Color.GRAY);
	}
	
}

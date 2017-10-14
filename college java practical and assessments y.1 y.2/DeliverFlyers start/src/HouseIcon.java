import becker.robots.icons.*;
import java.awt.*;

public class HouseIcon extends Icon
{
	public HouseIcon()
	{	super();
	}
	
	public void paintIcon(Graphics g)
	{
		Polygon house = new Polygon();
		house.addPoint(30, 30);
		house.addPoint(30, 70);
		house.addPoint(70, 70);
		house.addPoint(70, 30);
		house.addPoint(50, 10);
		house.addPoint(30, 30);
		
		g.setColor(Color.black);
		g.fillPolygon(house);
	}
}

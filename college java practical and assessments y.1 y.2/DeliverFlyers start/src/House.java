import becker.robots.*;

public class House extends Thing
{
	public House(City aCity, int aStr, int anAve)
	{	
            super(aCity, aStr, anAve);
	    this.setIcon(new HouseIcon());
	}
}

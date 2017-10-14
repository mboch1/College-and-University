package gamePKG;

public class ShipBattlecruiser implements Ships 
{
	public String shipType;
	public int x;
	public int y;

	public ShipBattlecruiser(String type)
	{
		shipType = type;
	}
	
	@Override
	public String type() {
		return shipType;
	}

	@Override
	public int getX() {
		return x;
	}

	@Override
	public int getY() {
		return y;
	}

	@Override
	public void setX(int xCoord) 
	{
		x = xCoord;
	}

	@Override
	public void setY(int yCoord) 
	{
		y = yCoord;
	}

	@Override
	public void setType(String type) 
	{
		shipType = type;
	}
}

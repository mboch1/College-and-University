package gamePKG;

import java.util.ArrayList;

public class ShipMoveHistory 
{
	public ArrayList<Ships> clonedShipList = new ArrayList<>();
	private Ships dummyShip = null;
	
	public ShipMoveHistory(ArrayList<Ships> ships)
	{
		cloneShipList(ships);
	}
	//create a ship clone
	private Ships cloneShip(Ships realShip)
	{
		int x, y;
		String type;
		
		x = realShip.getX();
		y = realShip.getY();
		type = realShip.type().toLowerCase();
		
		ShipFactory factory = new ShipFactory();
		dummyShip = factory.getShip(type);
		dummyShip.setX(x);
		dummyShip.setY(y);
		return dummyShip;
	}
	//get original ship list
	public void cloneShipList(ArrayList<Ships> shipsList)
	{
		for(int i=0; i<shipsList.size(); i++)
		{
			//get existing ship and make a copy, put it on new arraylist, return list:
			clonedShipList.add(cloneShip(shipsList.get(i)));
		}
	}
	//return cloned list
	public ArrayList<Ships> getClonedShipList()
	{
		return clonedShipList;
	}
}

package gamePKG;

import java.util.ArrayList;

public class TurnHistory
{
	private ArrayList<Ships> ships = new ArrayList<>();
	//create constructor which sets cloned list as this object unique ship list array
	public TurnHistory(ArrayList<Ships> shipList)
	{
		setClonedList(shipList);
	}
	
	public ArrayList<Ships> getClonedList()
	{
		return ships;
	}
	
	public void setClonedList(ArrayList<Ships> shipsList)
	{
		for(int i=0; i<shipsList.size(); i++)
		{
			ships.add(shipsList.get(i));
		}
	}
}

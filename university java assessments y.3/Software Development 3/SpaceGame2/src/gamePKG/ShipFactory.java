package gamePKG;

public class ShipFactory 
{
	public Ships getShip(String shipType)
	{
		  if(shipType == null)
		  {
			  return null;
	      }	
		  
	      if(shipType.equalsIgnoreCase("BATTLESTAR"))
	      {
	         return new ShipBattlestar("battlestar");
	      } 
	      else if(shipType.equalsIgnoreCase("BATTLECRUISER"))
	      {
	         return new ShipBattlecruiser("battlecruiser"); 
	      } 
	      else if(shipType.equalsIgnoreCase("BATTLESHOOTER"))
	      {
	         return new ShipBattleshooter("battleshooter"); 
	      } 
	      
	      else if(shipType.equalsIgnoreCase("PLAYER"))
	      {
		     return new ShipPlayer("player");
	      }
	      
		return null;
	}
}

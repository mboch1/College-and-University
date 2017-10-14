package gamePKG;

import java.util.ArrayList;

public class ShipBattleBehaviourContext 
{
	private ShipBattleBehaviour behaviour;
	
	public void setShipBattleBehaviour(ShipBattleBehaviour behaviour)
	{
		this.behaviour = behaviour;
	}
	
	//use the strategy:
	public void useShipBattleBehaviour(ArrayList<Ships> shipsList, GameRunner game)
	{
		behaviour.resolveBattle(shipsList, game);
	}

}

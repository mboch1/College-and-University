package gamePKG;

import java.util.ArrayList;
import java.util.Random;

//game running class, being observable for use in GUI
public class GameRunner implements Observable
{
	//player starting coordinates:
	public int pStartX;
	public int pStartY;
	//this variable flags game end:
	private boolean gameOverFlag=false;
	
	public GameRunner(ArrayList<Ships> shipsList)
	{}
	// ***********THIS IS OBSERVERVABLE CODE SECTION*****************
	private ArrayList<Board> gameObserver = new ArrayList<Board>();
	
	private int latestTurn=0;
	private String shipType=null;
	
	@Override
	public void registerObserver(Board o) {
		this.gameObserver.add(o);
	}

	@Override
	public void removeObserver(Board o) {
		this.gameObserver.remove(o);
	}

	@Override
	public void notifyObservers() {
		// TODO Auto-generated method stub
		
	}
	
	@Override
	public void notifyObservers(int latestTurn) {
		for(Board tempObj : this.gameObserver){
			tempObj.update(latestTurn);
		}
	}
	
	@Override
	public void notifyObservers(String shipType) {
		for(Board tempObj : this.gameObserver){
			tempObj.update(shipType);
		}
	}
	//read current data
	public void getTurnUpdate(int latestTurn)
	{
		setTurnUpdate(latestTurn);
		notifyObservers(latestTurn);
	}
	
	public void getShipUpdate(String shipType)
	{
		setShipUpdate(shipType);
		notifyObservers(shipType);
	}
	
	//set new data
	private void setTurnUpdate(int latestTurn)
	{
		this.latestTurn = latestTurn;
	}
	
	private void setShipUpdate(String shipType)
	{
		this.shipType = shipType;
	}
	
	// *********** THIS IS THE END*****************
	
	// *********** GAME LOGICS ********************
	
	//for command pattern - sets game over flag to true
	public void gameOver()
	{
		gameOverFlag=true;
	}
	//for board object thread to check if game is over:
	public boolean getFlagState()
	{
		return gameOverFlag;
	}
	
	private int getPlayerShipStartX()
	{
		Random rd = new Random();
		int plStX = rd.nextInt(2)+1;
		return plStX;
	}
	
	private int getPlayerShipStartY()
	{
		Random rd = new Random();
		int plStY = rd.nextInt(3);
		return plStY;
	}
	//using factory pattern:
	private Ships spawnShip(int x, int y)
	{	
		ShipFactory factory = new ShipFactory();
		Ships ship = null;
		
		Random rd = new Random();

		int type = rd.nextInt(100);
			
		if(type>=0&&type<34)
		{
			ship = factory.getShip("battleStar");
			ship.setX(x);
			ship.setY(y);
			shipType = "BattleStar";
			return ship;
		}
		if(type>33&&type<67)
		{
			ship = factory.getShip("battleCruiser");
			ship.setX(x);
			ship.setY(y);
			shipType = "BattleCruiser";
			return ship;
		}
		if(type>66&&type<=99)
		{
			ship = factory.getShip("battleShooter");
			ship.setX(x);
			ship.setY(y);
		    shipType = "BattleShooter";
		    return ship;
		}
		return ship;
	}
	//using factory pattern:
	private Ships spawnPlayerShip(int x, int y)
	{	
		ShipFactory factory = new ShipFactory();
		Ships ship = factory.getShip("player");
		
		ship.setX(x);
		ship.setY(y);
		//for observer:
		shipType = "Player";
		
		return ship;
	}
	//iterate through the list of ships and move each ship
	private void executeMoves(ArrayList <Ships> shipsList) 
	{
		boolean possible;
		int x, y, x1=0, y1=0, chance;

		//for each ship do:
		for(int i = 0; i<shipsList.size(); i++)
		{	
			//get current coords
			x = shipsList.get(i).getX();
			y = shipsList.get(i).getY();	

			//while:
			//Random rd = new Random();
			
			possible=false;
			
			while(possible==false)
			{
				Random rd = new Random();
				//random move for x and y [0,1]
				//there must be at least 1 move in each turn thus x1 and y1 cant both be 0
				while(x1==0&&y1==0)
				{
					x1 = rd.nextInt(2);
					y1 = rd.nextInt(2);
				}
				//there is 50% chance that the move will have negative value instead
				//check for X negative:
				chance = rd.nextInt(100);
				if(chance>=49)		
				{
					x1 = -x1;
				}
				//check for Y negative:
				chance = rd.nextInt(99);
				if(chance>=49)
				{
					y1 = -y1;
				}
				
				//check if move is possible for player ship:
				if(shipsList.get(i).type().equalsIgnoreCase("player"))
				{		
					//player ship can't step on 0,0 coordinates:
					if(x+x1!=0 && y+y1!=0)
					{
						if(x+x1<=3 && y+y1<=3 && x+x1>=0 && y+y1>=0)
						{
							//if possible save move and end while loop
							shipsList.get(i).setX(x+x1);
							shipsList.get(i).setY(y+y1);
							possible=true;
						}
					}
				}
				//check if move is possible, within bounds:
				if(shipsList.get(i).type().equalsIgnoreCase("battlestar"))
				{
					//check if move is possible, within bounds:
					if(x+x1<=3 && y+y1<=3 && x+x1>=0 && y+y1>=0)
					{
						//if possible save move and end while loop
						shipsList.get(i).setX(x+x1);
						shipsList.get(i).setY(y+y1);
						possible=true;
					}
				}	
				
				//check if move is possible, within bounds:
				if(shipsList.get(i).type().equalsIgnoreCase("battlecruiser"))
				{
					//check if move is possible, within bounds:
					if(x+x1<=3 && y+y1<=3 && x+x1>=0 && y+y1>=0)
					{
						//if possible save move and end while loop
						shipsList.get(i).setX(x+x1);
						shipsList.get(i).setY(y+y1);
						possible=true;
					}
				}	
				
				//check if move is possible, within bounds:
				if(shipsList.get(i).type().equalsIgnoreCase("battleshooter"))
				{
					//check if move is possible, within bounds:
					if(x+x1<=3 && y+y1<=2 && x+x1>=0 && y+y1>=0)
					{
						//if possible save move and end while loop
						shipsList.get(i).setX(x+x1);
						shipsList.get(i).setY(y+y1);
						possible=true;
					}
				}	
			}
		}
	}
	
	//checks for player pawn position and if there are any ships
	private void resolveBattles(ArrayList<Ships> shipsList, GameRunner game, ShipBattleBehaviourContext battle)
	{
		battle.useShipBattleBehaviour(shipsList, game);
	}
	
	//main method for this class, controlling the turn process:
	public void nextTurn(ArrayList<Ships> shipsList, GameRunner game, ShipBattleBehaviourContext battle)
	{	
		if(shipsList.size()>=1)
		{
			//execute moves for ships existing at the end of last turn:
			executeMoves(shipsList);
		}
		//if its turn 0 create new player ship:
		if(latestTurn==0)
		{
			executeMoves(shipsList);
			pStartX = getPlayerShipStartX();
			pStartY = getPlayerShipStartY();
			//set player ship, it will always be 1st on the ship list!
			shipsList.add(spawnPlayerShip(pStartX, pStartY));
			//notify turn observer:
			getTurnUpdate(latestTurn);
			latestTurn = latestTurn+1;
		}
		
		//if its turn higher than 0 proceed with normal game:
		if(latestTurn>=1)
		{
			//spawn new ship 33% chance:
			Random rd = new Random();
			int check = rd.nextInt(100);
			
			if(check<34)
			{	
				shipsList.add(spawnShip(0,0));
			}
			else
			{
				shipType = null;
			}
			//check for battles:
			resolveBattles(shipsList, game, battle);
			//notify game history observer if new ship was created:
			getShipUpdate(shipType);
			//notify turn observer:
			getTurnUpdate(latestTurn);
			latestTurn = latestTurn+1;
		}
	}
}

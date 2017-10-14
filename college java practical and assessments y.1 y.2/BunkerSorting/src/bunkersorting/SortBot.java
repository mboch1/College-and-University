package bunkersorting;

import becker.robots.*;

public class SortBot extends RobotSE implements Runnable
{

    public SortBot(City city, int i, int i1, Direction drctn) 
    {
        super(city, i, i1, drctn);
    }
    
    public void MovePick() 
  { 
    this.move(); 
    this.pickAllThings();
    this.turnAround();
    this.move();
    this.turnLeft(); 
    this.move();
    this.turnLeft();
    this.move(2);
    this.turnLeft();
    this.move();
    this.turnRight();
  } 
    public void MovePut()
    {
    for(int i = 0; i<3; i++)
{
    this.move();
    this.putThing();
    this.turnAround();
    this.move();
    this.turnLeft();
    this.move();
    this.turnLeft();
    this.move(2);
    this.turnLeft();
    this.move();
    this.turnRight();
}
    
    
    }
    
    @Override
    public void run()
    {
       this.MovePick();
       this.MovePut();
    }
    
}

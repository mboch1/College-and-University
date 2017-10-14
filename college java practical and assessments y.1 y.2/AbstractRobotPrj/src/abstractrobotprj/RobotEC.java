package abstractrobotprj;

import becker.robots.*;


public abstract class RobotEC extends Robot
{
    public RobotEC(City c, int s, int a, Direction d)
    {
        super(c,s,a,d); 
    }
    
    abstract public void moveFast();
     
    public void spin()
    {
        this.turnLeft();
        this.turnLeft();
        this.turnLeft();
        
    }
}

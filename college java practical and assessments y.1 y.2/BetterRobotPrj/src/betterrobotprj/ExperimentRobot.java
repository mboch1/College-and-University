package betterrobotprj;
    
import becker.robots.*;


public class ExperimentRobot extends Robot
{
       //constructor
    public ExperimentRobot(City city, int i, int i1, Direction drctn) 
    {   
        super(city, i, i1, drctn);
    }
       //overloaded constructor
    public ExperimentRobot(City aCity)
    {
        super(aCity, 0, 0, Direction.EAST);
    }

        //methods
    public void turnAround()
    {
        this.turnLeft();
        this.turnLeft();
    }
    
    public void turnRight()
    {
        this.turnAround();
        this.turnLeft();
    }
    
    public void move3()
    {
        this.move();
        this.move();
        this.move();
    }
    
}

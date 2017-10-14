package betterrobotprj;

import becker.robots.*;

public class BetterRobotPrj
{

    public static void main(String[] args)
    {
        
        City ayr = new City();
        
        //extended class robot
        ExperimentRobot lisa = new ExperimentRobot(ayr,3,2, Direction.SOUTH);
        ExperimentRobot lars = new ExperimentRobot(ayr,5,2, Direction.SOUTH);
        
        lisa.move3();
        lars.move3();
        lisa.turnAround();
        lisa.move3();
        lisa.turnRight();
        lisa.move3();
        
        lars.move3();
        lars.turnAround();
        lars.move3();
        lars.turnRight();
        lars.move3();

    }
    
}

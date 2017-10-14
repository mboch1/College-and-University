package karelprj;

import becker.robots.*;

public class KarelPrj 
{


    public static void main(String[] args) 
    {
        City ayr = new City();
        Robot karel = new Robot(ayr,5,3, Direction.EAST, 8);
        Thing baton = new Thing(ayr,5,4);
        
        karel.move();
        karel.putThing();
        karel.turnLeft();
        karel.pickThing();
        karel.move();
        karel.putThing();
        karel.move();
        karel.putThing();
        karel.move();
        karel.putThing();

    }
    
}

package abstractrobotprj;

import becker.robots.*;

public class BikeBot extends RobotEC
{
        public BikeBot(City c, int s, int a, Direction d)
    {
        super(c,s,a,d); 
    }
        
        @Override
        public void moveFast()
        {
            this.setSpeed(10);
            this.move();
            this.setSpeed(3);
        }

}

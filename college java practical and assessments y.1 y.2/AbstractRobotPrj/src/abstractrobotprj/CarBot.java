package abstractrobotprj;

import becker.robots.*;

public class CarBot extends RobotEC
{

    public CarBot(City c, int s, int a, Direction d)
    {
        super(c,s,a,d); 
    }
        
        @Override
        public void moveFast()
        {
            this.setSpeed(20);
            this.move();
            this.setSpeed(3);
        }

}

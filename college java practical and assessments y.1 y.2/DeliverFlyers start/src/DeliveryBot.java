import becker.robots.*;

public class DeliveryBot extends RobotSE implements Runnable
{ /** Construct a robot to deliver flyers. */
    
 public DeliveryBot(City aCity, int aStr, int anAve, Direction aDir, int numThings)
 { 
    super(aCity, aStr, anAve, aDir, numThings);
 }
 
    /**
     *
     */
 @Override
    public void run()       
{
    this.deliverBlock();
}
 
private void crossStreet() 
  { 
    this.move(); 
    this.turnLeft(); 
  } 
 
  /** Go to the other side of the Avenue. We're on a side 
 * street and need to go to the opposite side street. */ 
 
private void goToOtherSide() 
  { this.turnLeft(); 
    this.move(); 
    this.move(); 
    this.move(); 
    this.move(); 
    this.move(); 
    this.turnAround(); 
  } 
 
  
private void goAroundCorner() 
  { 
    this.turnRight(); 
    this.move(); 
    this.move(); 
  } 


private void deliverLastHouse() 
  { 
    this.goAroundCorner(); 
    this.turnRight(); 
    this.move(); 
    this.putThing(); 
    this.turnAround(); 
    this.move(); 
  }

 
private void deliverHouse() 
  { 
    this.turnRight(); 
    this.move(); 
    this.putThing(); 
    this.turnAround(); 
    this.move(); 
    this.turnRight(); 
    this.move(); 
  }
 
  
void deliverBlock() 
  { 
    this.deliverHouse(); 
    this.deliverHouse(); 
    this.goAroundCorner(); 
    this.deliverHouse(); 
    this.deliverHouse(); 
    this.deliverHouse(); 
    this.deliverLastHouse(); 
  }
  
private void deliverOneAvenue() 
   { 
    this.deliverOneSide(); 
    this.goToOtherSide(); 
    this.deliverOneSide(); 
   } 
  
private void deliverOneSide() 
  { 
    this.deliverBlock(); 
    this.crossStreet(); 
    this.deliverBlock(); 
  }
  
 public void deliverFlyers() 
  { 
    this.deliverOneAvenue(); 
    this.turnRight(); 
    this.move(); 
    this.deliverOneAvenue(); 
  } 
  
}
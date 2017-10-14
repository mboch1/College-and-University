//Created on: 12/03/2017 by 40270585
//version status: final
//this is the game logics class for handling the game rules
class GameLogics{
  
  //create variabes to hold player pin colour choice
  int pin1=0;
  int pin2=0;
  int pin3=0;
  
  //construct a new game and generate password:
  private GameLogics(){
    pin1 = int(random(1,6));
    pin2 = int(random(1,6));
    pin3 = int(random(1,6));
  }
  
  //ensure that the game was set to start
  public boolean startGame(){
    return true;
  }
  
  //GETTERS:
  public int getPin1(){
    return pin1;
  }
  
  public int getPin2(){
    return pin2;
  }
  
  public int getPin3(){
    return pin3;
  }
  
  //check if the game is finished [password was found]:
  public boolean checkGameEnd(int val1, int val2, int val3){
    if(pin1==val1&&pin2==val2&&pin3==val3){
      //game should end
      return true;
    }
    else{
      return false;
    }
  }
  
  //this should return either 0, 1, 2 or 3 for use with red LED
  public int checkRightPosition(int val1, int val2, int val3){
    int pins =0;
    
    //for each value check:
    if(val1==getPin1()){
      pins++;    
    }
    if(val2==getPin2()){
      pins++;  
    }
    if(val3==getPin3()){
      pins++;  
    }
    return pins;
  }

  /*
  this should return either 0, 1, 2 or 3 for use with yellow LED
  each right colour can be awarded only once and only if it was not 
  occupying the right position
  */
  public int checkRightColours(int val1, int val2, int val3){
    int colours = 0;
    //award player with either 2 (different colours) or 1 yellow pins:
    if(val1==getPin1()){
      if(val2==getPin3()&&val3==getPin2()){
          return 2;
      }
      else if(val2==getPin3()||val3==getPin2()){
          return 1;
      }
    }
    
    if(val2==getPin2()){
      if(val1==getPin3()&&val3==getPin1()){
          return 2;
      }
      else if(val1==getPin3()||val3==getPin1()){
          return 1;
      }
    }
    
    if(val3==getPin3()){
      if(val1==getPin2()&&val2==getPin1()){
          return 2;
      }       
      else if(val1==getPin2()||val2==getPin1()){
          return 1;
      }  
    }
    
    //check if valid for remaining pins, best case it will return 3   
    if(val1!=getPin1()&&(val1==getPin2()||val1==getPin3())){
      colours++;
    }
    if(val2!=getPin2()&&(val2==getPin1()||val2==getPin3())){
      colours++;
    }
    if(val3!=getPin3()&&(val3==getPin1()||val3==getPin2())){
      colours++;
    }
    return colours;
  }
  
  //This method returns a value to be transfered on Arduino
  //Arduino then reads it and sends to shift register to light up
  //the proper leds - int a - red pins - int b- yellow pins
  int setShiftReg(int a, int b){    
    if(a == 0 && b == 1){
       return 1;
    }
    if(a == 0 && b == 2){
       return 3;
    }
    if(a == 0 && b == 3){
       return 7;
    }
    if(a == 1 && b == 0){
       return 8;
    }
    if(a == 1 && b == 1){
       return 9;
    }
    if(a == 1 && b == 2){
       return 11;
    }
    if(a == 2 && b == 0){
       return 24;
    }
    if(a == 3 && b == 0){
       return 56;
    }
    return 0;
  }
  //reroll the random pin numbers method:
  public void reroll(){
    pin1 = int(random(1,6));
    pin2 = int(random(1,6));
    pin3 = int(random(1,6));
  }
}
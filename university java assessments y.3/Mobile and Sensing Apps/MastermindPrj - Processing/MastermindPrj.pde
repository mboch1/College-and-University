//Created on: 12/03/2017 by 40270585
//version status: final
//main class for the game, responsible for: event handling, GUI drawing, bt connection, 
//game setup and running the program
import android.content.Intent;
import android.os.Bundle;
import ketai.net.bluetooth.*;
import ketai.ui.*;
import ketai.net.*;

//setup app start up config and bt
PFont f;
boolean bReleased = true; //no permament sending when finger is tap
KetaiBluetooth bt;
GameLogics ng = new GameLogics();
boolean isConfiguring = true;
String info = "";
KetaiList klist;
ArrayList devicesDiscovered = new ArrayList();
byte[] data = {0, 0, 0, 0};
//setup game:
boolean locked = false;
boolean sending = false;
boolean gameRunning = false;
boolean gameEnd = false;
int redPins = 0;
int yellowPins = 0;
int turn = 0;
//color variables
color currentcolor;
//base colours:
color red = color(255,12,12);
color green = color(12, 255, 12);
color blue = color(12, 12, 255);
//mixed colours:
color yellow = color(255,255,12);
color pink = color(255,105,180);
//default circle starting colour:
color startGrey = color(155, 155, 155);
color basecolor = color(200, 100, 100);
color highlight = color(155,155,155);
//create non button pins:
Circle circle1, circle2, circle3;
//create buttons:
CircleButton sendButton, startButton;
CircleButton circle1red, circle2red, circle3red;
CircleButton circle1blue, circle2blue, circle3blue;
CircleButton circle1green, circle2green, circle3green;
CircleButton circle1yellow, circle2yellow, circle3yellow;
CircleButton circle1pink, circle2pink, circle3pink;
//********************************************************************
// The following code is required to enable bluetooth at startup.
//********************************************************************

void onCreate(Bundle savedInstanceState){
 super.onCreate(savedInstanceState);
 bt = new KetaiBluetooth(this);
}

void onActivityResult(int requestCode, int resultCode, Intent data){
 bt.onActivityResult(requestCode, resultCode, data);
}

void setup(){
 //Get device display size
 size(displayWidth, displayHeight);
 //setup graphics ui:
 smooth();
 frameRate(15);
 orientation(PORTRAIT);
 //start listening for BT connections
 bt.start();
 //at app start select device…
 isConfiguring = true;
 //font config
 f = createFont("SansSerif",30,true);
  //draw password pins - don't refresh them, colours set only by player events:
   circle1 = new Circle(displayWidth*0.2, displayHeight*0.3);
   circle2 = new Circle(displayWidth*0.4, displayHeight*0.3);
   circle3 = new Circle(displayWidth*0.6, displayHeight*0.3);
}

void draw() {
  //PREPARE GUI:
  //set black background
   background(0);
  //button start new game:
   textFont(f);
   textAlign(CENTER);
   fill(yellow);
   textSize(60);
   text("START", displayWidth*0.2, displayHeight*0.185);
   startButton = new CircleButton(displayWidth*0.2, displayHeight*0.1, 128, startGrey, highlight);
  //button send
   textFont(f);
   textAlign(CENTER);
   fill(yellow);
   textSize(60);
   text("SEND", displayWidth*0.4, displayHeight*0.185);
   sendButton = new CircleButton(displayWidth*0.4, displayHeight*0.1, 128, startGrey, highlight);
  //turn counter:
   textFont(f);
   textAlign(CENTER);
   fill(yellow);
   textSize(60);
   text("TURN: "+turn, displayWidth*0.6, displayHeight*0.185);
   //for debug only show red and yellow pins:
   //text("Yellow: "+yellowPins, displayWidth*0.2+500, displayHeight*0.1+200);
   //fill(red);
   //text("Red: "+redPins, displayWidth*0.2+500, displayHeight*0.1+300);
 //set game over text:
   if(turn == 8){
     gameRunning = false;
     fill(red);
     text("password was: "+ng.getPin1()+ng.getPin2()+ng.getPin3(), displayWidth*0.5, displayHeight*0.9);
     fill(red);
     textAlign(CENTER);
     text("GAME OVER - PRESS START", displayWidth*0.5, displayHeight*0.95);
   }
 //button led 1:
   circle1red = new CircleButton(displayWidth*0.2, displayHeight*0.4, 128, red, highlight);
   circle1green = new CircleButton(displayWidth*0.2, displayHeight*0.5, 128, green, highlight);
   circle1blue = new CircleButton(displayWidth*0.2, displayHeight*0.6, 128, blue, highlight);
   circle1yellow = new CircleButton(displayWidth*0.2, displayHeight*0.7, 128, yellow, highlight);
   circle1pink = new CircleButton(displayWidth*0.2, displayHeight*0.8, 128, pink, highlight);
 //button led 2:
   circle2red = new CircleButton(displayWidth*0.4, displayHeight*0.4, 128, red, highlight);
   circle2green = new CircleButton(displayWidth*0.4, displayHeight*0.5, 128, green, highlight);
   circle2blue = new CircleButton(displayWidth*0.4, displayHeight*0.6, 128, blue, highlight);
   circle2yellow = new CircleButton(displayWidth*0.4, displayHeight*0.7, 128, yellow, highlight);
   circle2pink = new CircleButton(displayWidth*0.4, displayHeight*0.8, 128, pink, highlight);
 //button led 3:
   circle3red = new CircleButton(displayWidth*0.6, displayHeight*0.4, 128, red, highlight);
   circle3green = new CircleButton(displayWidth*0.6, displayHeight*0.5, 128, green, highlight);
   circle3blue = new CircleButton(displayWidth*0.6, displayHeight*0.6, 128, blue, highlight);
   circle3yellow = new CircleButton(displayWidth*0.6, displayHeight*0.7, 128, yellow, highlight);
   circle3pink = new CircleButton(displayWidth*0.6, displayHeight*0.8, 128, pink, highlight);
 
 //at app start - select device using Ketai interface:
 if (isConfiguring) {
    ArrayList names;
    background(78, 93, 75);
    klist = new KetaiList(this, bt.getPairedDeviceNames());
    isConfiguring = false;
 }
 //once bt device is selected create GUI:
 else{
   update(mouseX, mouseY);
   
   sendButton.display();
   startButton.display();
   
   circle1.display();
   circle1red.display();
   circle1green.display();
   circle1blue.display();
   circle1yellow.display();
   circle1pink.display();
   
   circle2.display();
   circle2red.display();
   circle2green.display();
   circle2blue.display();
   circle2yellow.display();
   circle2pink.display();
   
   circle3.display();
   circle3red.display();
   circle3green.display();
   circle3blue.display();
   circle3yellow.display();
   circle3pink.display();
   
   if(gameRunning==false){
      //send a byte signal array to BT:
      bt.broadcast(data);
   }
   else{
      //send a byte signal array to BT:
      bt.broadcast(data);
      //System.out.println("game started"+" "+data[0]+" "+data[1]+" "+data[2]+" "+data[3]);
   }
 }
}

void update(int x, int y){
  
    circle1.update();
    circle2.update();
    circle3.update();
    
  if(locked == false){
    circle1red.update();
    circle1green.update();
    circle1blue.update();
    circle1yellow.update();
    circle1pink.update();
    
    circle2red.update();
    circle2green.update();
    circle2blue.update();
    circle2yellow.update();
    circle2pink.update();
    
    circle3red.update();
    circle3green.update();
    circle3blue.update();
    circle3yellow.update();
    circle3pink.update();
    
    sendButton.update();
    startButton.update();
  } 
  else{
    locked = false;
  }

  if(mousePressed){
    if(circle1red.pressed()) {
      circle1.setColor(red);
      circle1.setValue(1);
    } 
    else if(circle1green.pressed()) {
      circle1.setColor(green);
      circle1.setValue(2);
    } 
    else if(circle1blue.pressed()) {
      circle1.setColor(blue);
       circle1.setValue(3);
    } 
    else if(circle1yellow.pressed()) {
      circle1.setColor(yellow);
      circle1.setValue(4);
    } 
    else if(circle1pink.pressed()) {
      circle1.setColor(pink);
      circle1.setValue(5);
    } 
    else if(circle2red.pressed()) {
      circle2.setColor(red);
      circle2.setValue(1);
    } 
    else if(circle2green.pressed()) {
      circle2.setColor(green);
      circle2.setValue(2);
    } 
    else if(circle2blue.pressed()) {
      circle2.setColor(blue);
      circle2.setValue(3);
    } 
    else if(circle2yellow.pressed()) {
      circle2.setColor(yellow);
      circle2.setValue(4);
    } 
    else if(circle2pink.pressed()) {
      circle2.setColor(pink);
      circle2.setValue(5);
    } 
    else if(circle3red.pressed()) {
      circle3.setColor(red);
      circle3.setValue(1);
    } 
    else if(circle3green.pressed()) {
      circle3.setColor(green);
      circle3.setValue(2);
    } 
    else if(circle3blue.pressed()) {
      circle3.setColor(blue);
      circle3.setValue(3);

    } 
    else if(circle3yellow.pressed()) {
      circle3.setColor(yellow);
      circle3.setValue(4);
    } 
    else if(circle3pink.pressed()) {
      circle3.setColor(pink);
      circle3.setValue(5);
    } 
    else if(sendButton.pressed()) {
      //if fields are grey or the game is already sending data the button wont send anything:
      if(sending == false && circle1.getValue()!=0&& circle2.getValue()!=0&& circle3.getValue()!=0)
      {
          sending = true;
          //check if the game should end now:
          gameEnd = ng.checkGameEnd(circle1.getValue(),circle2.getValue(),circle3.getValue());
          //check red pins:
          redPins = ng.checkRightPosition(circle1.getValue(),circle2.getValue(),circle3.getValue());
          //can't get yellow pins if this is true:
          if(redPins >= 2){
            yellowPins=0;             
          }
          else{
            yellowPins = ng.checkRightColours(circle1.getValue(),circle2.getValue(),circle3.getValue());
          }
          //send with BT: {led1, led2, led3, red leds, yellow leds}
          data[0] = (byte)circle1.getValue();
          data[1] = (byte)circle2.getValue();
          data[2] = (byte)circle3.getValue();
          data[3] = (byte)ng.setShiftReg(redPins, yellowPins);
          
          //this is to indicate if the game has ended on android:
          if(gameEnd==false)
          {
            circle1.setColor(startGrey);
            circle2.setColor(startGrey);
            circle3.setColor(startGrey);
            turn++; 
          }
          else{
            //you can now start a new game also broadcast to arduino will be stopped from now on:
            gameRunning = false;
            //System.out.println("game finished");
          }
          //end of button pressed evt: 
          sending = false;
      }
    } 
    else if(startButton.pressed() && gameRunning==false) {
      gameRunning = ng.startGame();
      ng.reroll();
      //System.out.println("game started!");
      turn = 0;
    }
    else{
      //handle nothing selected in future
    }
  }
}

void onKetaiListSelection(KetaiList klist){
   String selection = klist.getSelection();
   bt.connectToDeviceByName(selection);
   //dispose of list for now
   klist = null;
}

//Call back method to manage data received
void onBluetoothDataEvent(String who, byte[] data){
   if (isConfiguring)
   return;
   //received
   info += new String(data);
   //clean if string to long
   if(info.length() > 150)
   info = "";
}

// Arduino+Bluetooth+Processing 
// Arduino-Android Bluetooth communication
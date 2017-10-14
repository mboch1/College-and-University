//Author: 40270585
//Date: 15/03/2017 version final
//This is the main code for the Arduino Mastermind Electric Edition project
#include <SoftwareSerial.h>

//SHIFT REGISTER:
//Pin connected to ST_CP of 74HC595 (green wire)
int latchPin = 3;
//Pin connected to SH_CP of 74HC595 (yellow wire) 
int clockPin = 2;
////Pin connected to DS of 74HC595(blue wire) 
int dataPin = 4;

//3C LEDs:
//1
int redPin = 13;
int greenPin = 12;
int bluePin = 11;
//2
int redPin2 = 10;
int greenPin2 = 9;
int bluePin2 = 8;
//3
int redPin3 = 7;
int greenPin3 = 6;
int bluePin3 = 5;
//BLUETOOTH:
SoftwareSerial BTserial(0, 1); // RX | TX
// Connect the HC-05 TX to Arduino pin 2 RX. 
// Connect the HC-05 RX to Arduino pin 3 TX through a voltage divider.
//Incoming bluetooth signal as an ascii character [8bits]:
char c = ' ';
int leds = 0;
byte num = 0;
int pos[] = {0,0,0,0};

//set the led colour based on given value, using values lower than 255
//reduces possible flickering
void setColor(int pinR, int pinG, int pinB, int value){
  if(value==0)
  {
    analogWrite(pinR, 0);
    analogWrite(pinG, 0);
    analogWrite(pinB, 0); 
  }
  //red
  else if(value==1){
    analogWrite(pinR, 224);
    analogWrite(pinG, 0);
    analogWrite(pinB, 0); 
  }
  //green
  else if(value==2){
    analogWrite(pinR, 0);
    analogWrite(pinG, 224);
    analogWrite(pinB, 0);    
  }
  //blue
  else if(value==3){
    analogWrite(pinR, 0);
    analogWrite(pinG, 0);
    analogWrite(pinB, 224);    
  }
  //yellow
  else if(value==4){
    analogWrite(pinR, 224);
    analogWrite(pinG, 224);
    analogWrite(pinB, 0);    
  }
  //pink
  else if(value==5){
    analogWrite(pinR, 224);
    analogWrite(pinG, 100);
    analogWrite(pinB, 172);    
  }
  else{}  
}
//switch the leds on
void lightLeds(){
  setColor(redPin, greenPin, bluePin, pos[0]);
  setColor(redPin2, greenPin2, bluePin2, pos[1]);
  setColor(redPin3, greenPin3, bluePin3, pos[2]);
}

void updateShiftRegister(int s){
    // the LEDs don't change while you're sending in bits:
      digitalWrite(latchPin, LOW);
      delay(5);
      // shift out the bits:
      shiftOut(dataPin, clockPin, MSBFIRST, s);  
      //take the latch pin high so the LEDs will light up:
      digitalWrite(latchPin, HIGH);
      // pause before next value:
      delay(5);
}

//void blinkAll_2Bytes() {
//  digitalWrite(latchPin, 0);
//  shiftOut(dataPin, clockPin, 0);
//  shiftOut(dataPin, clockPin, 0);
//  digitalWrite(latchPin, 1);
//  delay(200);
//  for (int x = 0; x < 10; x++) {
//    digitalWrite(latchPin, 0);
//    shiftOut(dataPin, clockPin, 255);
//    shiftOut(dataPin, clockPin, 255);
//    digitalWrite(latchPin, 1);
//    delay(20);
//    digitalWrite(latchPin, 0);
//    shiftOut(dataPin, clockPin, 0);
//    shiftOut(dataPin, clockPin, 0);
//    digitalWrite(latchPin, 1);
//    delay(20);
//  }
//}

void setup() {
  //3C LEDs:
  pinMode(redPin, OUTPUT);
  pinMode(greenPin, OUTPUT);
  pinMode(bluePin, OUTPUT);  

  pinMode(redPin2, OUTPUT);
  pinMode(greenPin2, OUTPUT);
  pinMode(bluePin2, OUTPUT);  

  pinMode(redPin3, OUTPUT);
  pinMode(greenPin3, OUTPUT);
  pinMode(bluePin3, OUTPUT);  

  //SHIFT REGISTER
  pinMode(latchPin, OUTPUT);
  pinMode(clockPin, OUTPUT);
  pinMode(dataPin, OUTPUT);

  //BLUETOOTH
  Serial.begin(9600);
  Serial.println("Arduino is ready");
  Serial.println("Remember to select Both NL & CR in the serial monitor");

  // HC-05 default serial speed for AT mode is 38400
  BTserial.begin(9600); 
  
}
void loop(){
  //if there is a bt signal:  
    if(BTserial.available()){
      //String st = "";
      int i = 0;
      while(BTserial.available()){
        //read a single bt byte token at a time:
        c = BTserial.read();
        //cast c to int and assign it to a pos array
        pos[i]=(int)c;
        //st = st+pos[i]+" ";
        //Serial.println("position: "+st);
        i++;
      }
      //here what does the program need to do before reading new bt signal:
      lightLeds();
      leds = (int)pos[3];
      //Serial.println(leds);
      updateShiftRegister(leds);
      delay(200);
    }
}



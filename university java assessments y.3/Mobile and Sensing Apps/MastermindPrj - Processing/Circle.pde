//Created on: 12/03/2017 by 40270585
//code was based on the example from:
//http://processingjs.org/learning/topic/buttons/
//its responsible for handling inactive cirlce buttons
class Circle{
  float x;
  float y;
  float size = 128;
  int value = 0;
  color background = color(155,155,155);
  
  Circle(float ix, float iy){
    x = ix;
    y = iy;
  }
  
  void display(){
    stroke(255);
    fill(getColor());
    ellipse(x, y, size, size);
  }
  
  void update(){
    this.background = getColor();
  }
  
  void setColor(color selected){
    this.background = selected;
  }
  
  color getColor(){
    return background;
  }
  
  int getValue(){
    return value;
  }
  void setValue(int v){
    value = v;
  }
  
}
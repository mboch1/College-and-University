//Created on: 12/03/2017 by 40270585
//code was based on the example from:
//http://processingjs.org/learning/topic/buttons/
//this class provides Button object type to be used for button events 
class Button{
  float x, y;
  float size;
  
  color basecolor, highlightcolor;
  color currentcolor;
  
  boolean over = false;
  boolean pressed = false;   

  void update(){
    if(over()){
      currentcolor = highlightcolor;
    } 
    else{
      currentcolor = basecolor;
    }
  }
  
  boolean pressed(){
    if(over){
      locked = true;
      return true;
    } 
    else{
      locked = false;
      return false;
    }    
  }

  boolean over(){ 
    return true; 
  }
  
  boolean overCircle(float x, float y, float diameter){
    float disX = x - mouseX;
    float disY = y - mouseY;

    if(sqrt(sq(disX) + sq(disY)) < diameter/2 ){
      return true;
    } 
    else {
      return false;
    }
  }
}
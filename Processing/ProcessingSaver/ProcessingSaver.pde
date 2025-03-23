//Code adapted by Davide Riboli from the original "Processing Recorder" by Daniel Shiffman

//Save counter
int saved=1;

void setup() {
  size(480, 270);
}

void draw() {
  background(0);

  // Something to save. Replace lines 14 to 21 with your own code.
  for (float a = 0; a < TWO_PI; a+= 0.2) {
    pushMatrix();
    translate(width/2, height/2);
    rotate(a+sin(frameCount*0.004*a));
    stroke(255);
    line(-100, 0, 100, 0);
    popMatrix();
  }
}

void keyPressed() {

  // What should Processing do when you press "r".
  if (key == 's' || key == 'S') {
    save("Img_" + nf(saved,3) + ".png");
    saved = saved+1;
 
  }
}

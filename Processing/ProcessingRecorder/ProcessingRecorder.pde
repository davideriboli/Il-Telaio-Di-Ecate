//Code adapted from the original "Processing Recorder" by Daniel Shiffman.

// Boolean variable to manage registration status.
boolean recording = false;

void setup() {
  size(480, 270);
}

void draw() {
  background(0);

  // Something to record. Replace lines 14 to 21 with your own code.
  for (float a = 0; a < TWO_PI; a+= 0.2) {
    pushMatrix();
    translate(width/2, height/2);
    rotate(a+sin(frameCount*0.004*a));
    stroke(255);
    line(-100, 0, 100, 0);
    popMatrix();
  }

  // What Processing has to do when you start the recording.
  if (recording) {
    saveFrame("output/frames####.png");
  }

  /* 
  A touch of feedback...
  None of this will appear on the recording
  because the commands are invoked after "saveFrame".
  */
  textAlign(CENTER);
  fill(255);
  if (!recording) {
    text("Press r to START recording.", width/2, height-24);
  } else {
    text("Press r to STOP recording.", width/2, height-24);
  }

  // The classic red dot of "registration in progress".
  stroke(255);
  if (recording) {
    fill(255, 0, 0);
  } else { 
    noFill();
  }
  ellipse(width/2, height-48, 16, 16);
}

void keyPressed() {

  // What should Processing do when you press "r".
  if (key == 'r' || key == 'R') {
    recording = !recording;
  }
}

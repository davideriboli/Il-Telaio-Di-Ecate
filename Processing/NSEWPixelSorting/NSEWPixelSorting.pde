// Introduction to Pixel Sorting
// Pixel Sorting is a digital artistic technique that emerged with advanced digital image manipulation.
// It involves reorganizing the pixels of an image based on specific criteria, creating unique visual effects
// oscillating between abstraction and surrealism. Popularized by artist Kim Asendorf around 2010,
// this method became a stylistic signature for image alteration. Typically, sorting criteria rely on properties
// such as brightness, saturation, or position.

// Purpose of the Sketch
// This Processing sketch applies a variation of Pixel Sorting by manipulating the image uploaded by the user.
// The effect is modulated by random intensities associated with different "regions" of the image,
// similar to cardinal directions: North, South, East, and West.

// Main Commands
// 1. Image Upload: At startup, the user can select an image from their device.
// 2. Pixel Sorting: Once uploaded, the image pixels are sorted based on random intensities, which determine
//    the strength of the effect in different areas.
// 3. Intensity Reassignment: Each time the image is reprocessed (keyboard = "r"), the intensities (North, South, East, West)
//    are randomly generated, offering unique results every time.
// 4. To save your work: keyboard "space bar". The final effect creates a distinctive visual artwork, combining algorithmic control with artistic randomness.

// CREATED BY DAVIDE RIBOLI - 2024/12/13


PImage img; // The original image
PImage sortedImg; // A copy for sorting
boolean imageLoaded = false;

// Sorting intensity for each region
float northIntensity;
float southIntensity;
float eastIntensity;
float westIntensity;

void setup() {
  size(800, 800); // Set canvas size
  selectInput("Select an image to process:", "fileSelected");
}

void fileSelected(File selection) {
  if (selection == null) {
    println("No file was selected.");
    exit();
  } else {
    img = loadImage(selection.getAbsolutePath());
    sortedImg = img.copy(); // Create a copy to modify
    imageLoaded = true;
    resetRandomIntensities();
    pixelSort(); // Perform pixel sorting
  }
}

void resetRandomIntensities() {
  // Assign random values to intensities
  northIntensity = random(0.2, 1.0); // Random intensity for North. Set it to have a controlled value.
  southIntensity = random(0.2, 1.0); // Random intensity for South. Set it to have a controlled value.
  eastIntensity = random(0.2, 1.0);  // Random intensity for East. Set it to have a controlled value.
  westIntensity = random(0.2, 1.0);  // Random intensity for West. Set it to have a controlled value.

  println("New Intensity Values:");
  println("North: " + nf(northIntensity, 1, 2));
  println("South: " + nf(southIntensity, 1, 2));
  println("East: " + nf(eastIntensity, 1, 2));
  println("West: " + nf(westIntensity, 1, 2));
}

void pixelSort() {
  sortedImg.copy(img, 0, 0, img.width, img.height, 0, 0, img.width, img.height); // Reset to original
  sortedImg.loadPixels(); // Load the image's pixels

  for (int y = 0; y < sortedImg.height; y++) {
    // Extract a row of pixels
    int[] row = new int[sortedImg.width];
    for (int x = 0; x < sortedImg.width; x++) {
      row[x] = sortedImg.pixels[y * sortedImg.width + x];
    }

    // Sort based on region intensity
    row = customSortByBrightness(row, y);

    // Write the sorted row back into the image
    for (int x = 0; x < sortedImg.width; x++) {
      sortedImg.pixels[y * sortedImg.width + x] = row[x];
    }
  }
  sortedImg.updatePixels(); // Update the image pixels
}

int[] customSortByBrightness(int[] row, int y) {
  int width = row.length;
  int midX = width / 2;

  // Sort left (west) and right (east) parts of the row separately
  for (int i = 0; i < width - 1; i++) {
    for (int j = 0; j < width - i - 1; j++) {
      // Determine intensity based on the column's region (East/West)
      float intensity = (j < midX) ? westIntensity : eastIntensity;

      // Also adjust for North/South influence based on the row's region
      if (y >= sortedImg.height / 2) {
        intensity = (j < midX) ? southIntensity : eastIntensity;
      }

      // Apply sorting logic within the region's intensity
      int limit = int(width * intensity); // Limit sorting range
      if (j < limit && calculateBrightness(row[j]) > calculateBrightness(row[j + 1])) {
        // Swap pixels
        int temp = row[j];
        row[j] = row[j + 1];
        row[j + 1] = temp;
      }
    }
  }
  return row;
}

float calculateBrightness(int pixel) {
  // Calculate brightness from RGB values
  float r = red(pixel);
  float g = green(pixel);
  float b = blue(pixel);
  return (r + g + b) / 3;
}

void draw() {
  if (imageLoaded) {
    // Center the image on the canvas
    float xOffset = (width - sortedImg.width) / 2.0;
    float yOffset = (height - sortedImg.height) / 2.0;
    background(0); // Clear the canvas
    image(sortedImg, xOffset, yOffset);
  }
}

void keyPressed() {
  if (key == ' ') { // Save the image when spacebar is pressed
    saveOutput();
  } else if (key == 'r' || key == 'R') { // Reload the image with random intensities
    if (imageLoaded) {
      resetRandomIntensities();
      pixelSort(); // Reapply sorting with new intensities
    }
  }
}

void saveOutput() {
  if (imageLoaded) {
    String filename = "sorted_image_" + nf(millis(), 6) + ".png";
    sortedImg.save(filename);
    println("Image saved as: " + filename);
  } else {
    println("No image loaded to save.");
  }
}

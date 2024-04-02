
#define RED 30
#define GREEN 39
#define BLUE 40

#define pot 29
#define btn 35



#include "Iseplogo128.h"

//delay LED RGB
const unsigned long time_led = 400;

//delay data
const unsigned long data_time = 10;

//Temps d'animation
const unsigned long animationTime = 5000;

//Définir état LED
enum LED_State {
  Red_state,
  Green_state,
  Blue_state,
};
LED_State Current_LED_State = Red_state;

//Init temps pour la boucle led RGB
unsigned long time_init = 0;


char stringVoltage[10];

//Définir état écran.
enum OLED_State {
  Logo,
  Data,
  bmo,
};
OLED_State current_OLED_State = Logo;

//Définir état animation
enum BMO_State {
  BMO_State_1,
  BMO_State_2
};
BMO_State current_BMO_State = BMO_State_1;

//Init etat bouton
int pushState = 0;

//Init potentionètre
float voltage = 0.0;

void setup() {
  //initialisation ecran OLED:
  InitI2C();
  InitScreen();
  //Affichange logo SoundSculptor pour l'initialisation
  Display(logo);

  //RGB output
  pinMode(RED, OUTPUT);
  pinMode(GREEN, OUTPUT);
  pinMode(BLUE, OUTPUT);
  //Pot input
  pinMode(pot, INPUT);
  //Btn input
  pinMode(btn, INPUT);


  //Initialisation module bloetooth et carte tiva
  Serial.begin(9600);
  Serial1.begin(9600);
  Serial.println("APP G6D-SoundSculptor");
  Serial1.println("APP G6D-SoundSculptor");
  delay(2000);
}

void loop() {
  //delay qui n'utilise pas la fonction delay() (utilisé pour changer la couleur de la LED sans affecter les données
  unsigned long current_time = millis();
  if (current_time - time_init >= time_led) {
    Current_LED_State = Next_LED_State(Current_LED_State);
    time_init = current_time;
  }
  //Appeller la fonction qui change la couleur LED
  updateLED(Current_LED_State);


  //Appeller la fonction fonction bouton
  Push();

  //Basculer entre les états de l'écran
  if (pushState == 1) {
    current_OLED_State = Next_OLED_State(current_OLED_State);
    updateOLED(current_OLED_State);
    Serial.println(pushState);
  }

  //Appeller la fonction potentiomètre
  Pot();
  if (current_OLED_State == Data){
    DisplayString(0, 4, "Tension:");
    DisplayString(48, 4, stringVoltage);
    DisplayString(74, 4, "V");
  }
}


//Changer l'état LED RGB
LED_State Next_LED_State(LED_State etat) {
  switch (etat) {
    case Red_state:
      return Green_state;
    case Green_state:
      return Blue_state;
    case Blue_state:
      return Red_state;
  }
}

//Change la couleur LED en fonction de son état
void updateLED(LED_State state) {
  switch (state) {
    case Red_state:
      digitalWrite(RED, HIGH);
      digitalWrite(GREEN, LOW);
      digitalWrite(BLUE, LOW);
      break;
    case Green_state:
      digitalWrite(RED, LOW);
      digitalWrite(GREEN, HIGH);
      digitalWrite(BLUE, LOW);
      break;
    case Blue_state:
      digitalWrite(RED, LOW);
      digitalWrite(GREEN, LOW);
      digitalWrite(BLUE, HIGH);
      break;
  }
}

//Changer l'état de l'écran OLED
OLED_State Next_OLED_State(OLED_State state) {
  switch (state) {
    case Logo:
      return Data;
    case Data:
      return bmo;
    case bmo:
      return Logo;
  }
}

//Changer l'affichage de l'écran OLED en fonction de son état
void updateOLED(OLED_State state) {
  Pot();
  switch (state) {
    case Data:
      Display(none);
      DisplayString(2, 2, "APP-G6D-SoundSculptor");
      break;
    case Logo:
      Display(logo);
      break;
    case bmo:
      unsigned long bmoAnimationStartTime = millis();
      while (millis() - bmoAnimationStartTime < animationTime) {
        switch (current_BMO_State) {
          case BMO_State_1:
            delay(10);
            //Display(bmo1);
            Display(cat1);
            current_BMO_State = BMO_State_2;
            break;
          case BMO_State_2:
            delay(10);
            //Display(bmo2);
            Display(cat2);
            current_BMO_State = BMO_State_1;
            break;
        }
      }
      Display(logo);
  }
}

//Lire bouton
void Push() {
  pushState = !digitalRead(btn);
  Serial1.print(" Etat bouton:");
  Serial1.println(pushState);
  delay(data_time);
}

//Potentiomètre
void Pot() {
  int val = analogRead(pot);
  float voltage = val * (3.3 / 4096.0);
  
  Serial1.print("Valeur numérique = ");
  Serial1.print(val);
  Serial1.print("/");

  Serial1.print("Tension:");
  Serial1.print(voltage);
  delay(data_time);

  int beforePoint = int(voltage);
  int afterPoint = int((voltage - beforePoint) * 100+1); 

  sprintf(stringVoltage, "%d.%02d", beforePoint, afterPoint); 

}

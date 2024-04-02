//------------------------------------------------------------------------
// 
// Comm_passerelle
// Programme de test de la Communication avec la passerelle.
//
// Le sens Carte-APP --> Passerelle est entièrement codé. On peut tester
// l'envoi d'une valeur par défaut.
// Ensuite, il faut lire la valeur d'un capteur et envoyer cette valeur.
// Le sens Passerelle --> Carte-APP est à coder en complétant les
// fonctions Recep_Trame() et Analyse_Trame().
// 
// Modifier les lignes 184 à 186 pour mettre votre numéro d'équipe
// conformément à la programmation de "ChangeNameBlueTooth"
// 
//------------------------------------------------------------------------

//	LED tricolore de la carte AFFICHEUR
//------------------------------------------
#define	  LED_ROUGE		PF_1
#define	  LED_VERTE		PF_2
#define	  LED_BLEUE		PF_3
#define   micro       26
#define   temp        24
void setup() 
//------------------------------------------------------------------------
//------------------------------------------------------------------------
{
// initialiser les deux serial ports:
    Serial.begin(9600);			// port serie terminal Energia
    Serial1.begin(9600);		// port serie BlueTooth APP

// initialiser la communication avec la passerelle
	Init_ComPass();

// initialiser les ports de la Led tricolore
	pinMode(LED_ROUGE, OUTPUT);
	pinMode(LED_VERTE, OUTPUT);
	pinMode(LED_BLEUE, OUTPUT);
  pinMode(micro, INPUT);
  pinMode(temp, INPUT);
}


void   Send_Trame(char typeCapt, int valeurCapt);
void   Recep_Trame(void);
void   Analyse_Trame(void);

#define		CAPT_TEMP		0x33	/* type de capteur de temperature		*/
#define		CAPT_SONMIC		0x37	/* type de capteur de son/microphone	*/


void loop() 
//------------------------------------------------------------------------
//------------------------------------------------------------------------
{
	int valeur_Temp;
  int valeur_Micro;
	valeur_Temp = digitalRead(micro);
  valeur_Micro = digitalRead(temp);

  Serial.print("Valeur temp:");
  Serial.println(valeur_Temp);
		// lire le capteur de temperature
	//valeur_Temp = xxxxx;

	Send_Trame(CAPT_TEMP, valeur_Temp);
  Send_Trame(CAPT_SONMIC, valeur_Micro);
		// Lire la trame de réponse
	//Recep_Trame();
		// analyser la trame reçue	
		// afficher la trame reçue sur le terminal de Energia
	//Analyse_Trame();

	// Temporisation de 2 à 10 secondes
	delay(5000);
}


#define		SIZE_ENVOI	20
#define		SIZE_RECEP	20

char	TrameEnvoi[SIZE_ENVOI+1];
char	TrameRecep[SIZE_RECEP+1];

char   Conv_hexToAsc(int digit);


void  Recep_Trame(void)
//------------------------------------------------------------------------
//------------------------------------------------------------------------
{
	int nbrecu, len;	char digRecu;

	Serial.print("Trame Reçue = ");
	nbrecu = 0;
	// repeter autant de fois que necessaire
		// tester si un octet est dans le buffer de reception de Serial1 (BlueTooth)
		// si oui, lire l'octet et le mettre dans TrameRecep
	//
	// ajouter ici le code pour recevoir les octets et les mettre dans TrameRecep[]
	//
	Serial.println();		// retour à la ligne sur la console
}

void  Analyse_Trame(void)
//------------------------------------------------------------------------
//------------------------------------------------------------------------
{
	Serial.println(">>>  Debut Analyse");
	// Analyser la trame reçue dans le buffer TrameRecep[]

	// Si c'est un "écho" de la trame envoyée, ...
	//		le champ "requete" TrameRecep[5] = 1 = requete en ecriture = envoi Objet -> passerelle
	// ... alors ne rien faire

	// Si c'est un message venant du site web, ....
	//		le champ "requete" TrameRecep[5] = 2 = requete en lecture = envoi passerelle -> Objet
	// ... alors decider de l'action à faire

	Serial.println("<<<  Fin Analyse");
	Serial.println();		// retour à la ligne sur la console
}

void  Send_Trame(char typeCapt, int valeurCapt)
//------------------------------------------------------------------------
//------------------------------------------------------------------------
{
	int  digit, n;		char CheckSum, digAsc;

	TrameEnvoi[6] = typeCapt;	// le champ "type" : type de capteur

	// convertir la valeur du capteur en 4 chiffres ASCII (poid fort en premier)
	// conversion du 1er chiffre (poid fort)
	digit = (valeurCapt >> 12) & 0x0F;
	TrameEnvoi[9]  = Conv_hexToAsc(digit);
	// conversion du 2e chiffre
	digit = (valeurCapt >> 8) & 0x0F;
	TrameEnvoi[10] = Conv_hexToAsc(digit);
	// conversion du 3e chiffre
	digit = (valeurCapt >> 4) & 0x0F;
	TrameEnvoi[11] = Conv_hexToAsc(digit);
	// conversion du 4e chiffre (poid faible)
	digit = valeurCapt & 0x0F;			// pas besoin de décalage.
	TrameEnvoi[12] = Conv_hexToAsc(digit);

	// lire les octets de TrameEnvoi un par un et envoyer sur les deux lignes serie
	Serial.print("Trame Envoyée = ");
	// boucle pour envoyer une trame vers la passerelle
	CheckSum = 0;
	// envoi des 'SIZE_ENVOI-2' premiers octets
	for (n = 0; n < SIZE_ENVOI-2; n++) {
		Serial.print(TrameEnvoi[n]);	// afficher sur la console
		Serial1.print(TrameEnvoi[n]);	// envoyer au BlueTooth = passerelle
		CheckSum = CheckSum + TrameEnvoi[n];
	}
	digit  = (CheckSum >> 4) & 0x0F;	// poid fort du CheckSum
	digAsc = Conv_hexToAsc(digit);
	Serial.print(digAsc);				// envoi du poid fort
	Serial1.print(digAsc);
	digit  = CheckSum & 0x0F;			// poid faible du CheckSum
	digAsc = Conv_hexToAsc(digit);
	Serial.print(digAsc);				// envoi du poid faible
	Serial1.print(digAsc);
	Serial.println();		// retour à la ligne sur la console
}

char  Conv_hexToAsc(int digit)
//------------------------------------------------------------------------
// convertir un digit hexa (0..F) en caractère Ascii
//------------------------------------------------------------------------
{
	char valAsc;

	// garder que les 4 bits de poid faible = 1 chiffre hexa (0 à 15)
	digit &= 0x0F;
	valAsc = digit + 0x30;
	if (digit > 9)
		valAsc += 0x07;
	return valAsc;
}

void  Init_ComPass(void)
//------------------------------------------------------------------------
// Initialisation des buffers de communication avec la passerelle
//------------------------------------------------------------------------
{
	// initialiser les champs fixes du buffer d'envoi
	TrameEnvoi[0] = '1';		// type trame = trame courante
	// le champ objet : mettre le numero de groupe
	TrameEnvoi[1] = 'G';
	TrameEnvoi[2] = '0';		// mettre '1' pour le G10
	TrameEnvoi[3] = '6';		// votre numero de groupe
	TrameEnvoi[4] = 'D';		// la lettre de votre numéro d'équipe
	// le champ "requete" : envoi Objet -> passerelle = requete en ecriture
	TrameEnvoi[5] = '1';		// requete en ecriture
	// le champ "type" : type de capteur
		//TrameEnvoi[6] = x;	// ce champ est variable
	// le champ "numero" : numero du capteur
	TrameEnvoi[7] = '0';		// on va laisser le numero '01' pour
	TrameEnvoi[8] = '1';		// tous les capteurs qu'on utilise
	// le champ "valeur" : la valeur du capteur a envoyer au site web
		//TrameEnvoi[] = x;		// ce champ est variable octets 9,10,11,12
		//TrameEnvoi[] = x;
		//TrameEnvoi[] = x;
		//TrameEnvoi[] = x;
	// le champ "time stamp" : ce champ n'est pas utilisé par la passerelle
	TrameEnvoi[13] = 'F';		// valeur quelconque
	TrameEnvoi[14] = 'A';
	TrameEnvoi[15] = 'F';
	TrameEnvoi[16] = 'B';
	// le champ "checksum" : ce champ est variable
		//TrameEnvoi[17] = '0';
		//TrameEnvoi[18] = '0';		// 19e et dernier octet de la trame
}

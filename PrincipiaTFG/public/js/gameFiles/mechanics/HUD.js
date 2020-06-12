class HUD extends Phaser.Scene {
  constructor() {
    super({
      key: 'HUD'
    });
  }

  create() {

    ///////////  BACKGROUND  ///////////
    this.graphics = this.add.graphics();
    this.graphics.fillStyle(0xff0000);
    this.graphics.beginPath();
    this.graphics.moveTo(0, 0);
    this.graphics.lineTo(config.width, 0);
    this.graphics.lineTo(config.width, 30);
    this.graphics.lineTo(0, 30);
    this.graphics.lineTo(0, 0);
    this.graphics.closePath();
    this.graphics.fillPath();

    ///////////  TEXTOS  ///////////
    //Score
    this.score = this.add.bitmapText(390, 8, "pixelFont", "", 16).setScale(1.5);
    //Name
    this.p1 = this.add.bitmapText(160, 8, "pixelFont", "PROJECT PRINCIPIA", 16).setScale(1.5);
    //Lives
    this.live = this.add.bitmapText(5, 8, "pixelFont", "", 16).setScale(1.5);

    ///////////  EVENTOS  ///////////
    const Scene2 = this.scene.get('level');

    Scene2.events.on("scoreChange", this.updateScore, this);
    Scene2.events.on("livesChange", this.updateLives, this);
    Scene2.events.on("gameOver", this.gameOver, this);
  }

  ///////////  FUNCIONES  ///////////

  //Actualiza la puntuacion
  updateScore(player) {
    var sc = this.zeroPad(player.score, 6);
    this.score.setText(`SCORE ${sc}`);
  }
  //Formatea la puntuación
  zeroPad(number, size) {
    var stringNumber = String(number);
    while (stringNumber.length < (size || 2)) {
      stringNumber = "0" + stringNumber;
    }
    return stringNumber;
  }

  //Actualiza las vidas
  updateLives(player) {
    this.live.setText(`LIVES ${player.lives}`);
  }

  //Destruye el HUD
  gameOver() {
    this.graphics.destroy();
    this.score.destroy();
    this.p1.destroy();
    this.live.destroy();

  }
}
var gameSettings = {
  playerSpeed: 400,
  maxPowerups: 2,
  powerUpVel: 50,
}

var config = {
  width: 256*2,
  height: 256*2,
  backgroundColor: 0x110011,
  scene: [Preload, Level, GameOver, Victory, GameMenu, HUD, ChooseLevel, GameController, OptionsMenu],
  pixelArt: true,
  physics: {
    default: "arcade",
    arcade: {
      debug: true
    }
  }
}

var game = new Phaser.Game(config);
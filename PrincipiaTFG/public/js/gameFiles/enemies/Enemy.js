class Enemy extends Phaser.GameObjects.Sprite {
  constructor(config) {
    super(config.scene, config.x, config.y);

    //PARAMS//
    //Scene
    this.scene = config.scene;
    this.totalX = 512;
    this.totalY = 512;
    this.movement = config.movement;
    this.loopsLeft = config.loop;

    //Configuración
    this.scene.physics.world.enable(this);
    this.scene.add.existing(this);
    this.setInteractive();

    //Añadir al grupo "enemies"
    this.scene.enemies.add(this);

    this.hasLoot = parseInt(Math.random() * 100);

  }

  update() {
    this.moveShip();
  }

  //Resetear posicion de la nave
  resetShipPos(posX, posY) {
    if (this.loopsLeft > 0) {
      this.x = posX;
      this.y = posY;
      this.loopsLeft--;
    } else {
      this.destroy();
    }
  }

  shoot(num) {
    console.log('paw');
    this.scene.time.addEvent({
      delay: 300,
      callback: () => {
        this.scene.beamSound.play();
        this.scene.shoot = new Shoot({ scene: this.scene, x: this.x, y: this.y, w: this.width, h: this.height, velx: 0, vely: 5 });
      },
      callbackScope: this,
      repeat: num
    });



  }

  updateLives() {
    if (this.color == 'anim-ballGreen') {
      console.log('papa');
      this.moveUp();
      return;
    }
    if (this.canTouch) {
      if (this.lives > 0) {
        this.lives--;
      } else {
        if (this.hasLoot >= 97) {
          //Powerup 
          this.powerup = new Powerup({
            scene: this.scene,
            x: this.x,
            y: this.y,
            key: "powerup",
            anim: Math.random()
          });
        }
        this.destroy();
      }
    }
  }
}
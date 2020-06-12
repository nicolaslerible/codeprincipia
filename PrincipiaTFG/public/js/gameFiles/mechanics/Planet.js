class Planet extends Phaser.GameObjects.Sprite {
  constructor(config) {
    super(config.scene, config.x, config.y);

    //PARAMS//
    //Scene
    this.scene = config.scene;
    this.size = 2;
    this.animation = config.anim;
    this.isSmall = config.small;
    this.position = config.pos;
    this.isMoving = false;

    //Animación        
    this.play(this.animation);

    //Configuración
    this.scene.physics.world.enable(this);
    this.scene.add.existing(this);
    this.setInteractive();

    this.setScale(this.size);

    if (this.isSmall) {
      this.startSmall();
    }

    //Añadir beam al grupo proyectiles
    this.scene.planets.add(this);


  }

  update() {
    
  }

  startSmall() {
    this.size = this.size - 1;
    this.setScale(this.size);
  }

  managePlanet(dir) {
    this.isMoving = true;

    if (this.body.x <= 113*2 && this.body.x == 112*2) {
      this.changeSize(-1);
    } else if (((this.body.x >= 230*2 && this.body.x <= 231*2) && dir < 0) || ((this.body.x <= 11*2 && this.body.x >= 10*2) && dir > 0)) {
      this.changeSize(1);
    }
    for (var i = 0; i < 10; i++) {
      this.scene.time.addEvent({
        delay: 15 * i,
        callback: () => {
          this.x += 22 * dir;
        },
        callbackScope: this,
        loop: false
      });
    }
    this.isMoving = false;
  }

  changeSize(dir) {

    for (var i = 0; i < 10; i++) {
      this.scene.time.addEvent({
        delay: 15 * i,
        callback: () => {
          this.size += 0.1*dir;
          this.setScale(this.size);
        },
        callbackScope: this,
        loop: false
      });
    }
  }

}
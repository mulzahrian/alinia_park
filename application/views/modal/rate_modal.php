<!-- Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ratingModalLabel">Rate and Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ratingForm">
          <div class="form-group">
            <label for="rating">Rating</label>
            <div id="rating" class="star-rating">
            <div class="feedback">
    <form id="radioForm">
    <label class="angry">
        <input type="radio" value="1" name="feedback" />
        <div>
            <svg class="eye left">
                <use xlink:href="#eye">
            </svg>
            <svg class="eye right">
                <use xlink:href="#eye">
            </svg>
            <svg class="mouth">
                <use xlink:href="#mouth">
            </svg>
        </div>
    </label>
    <label class="sad">
        <input type="radio" value="2" name="feedback" />
        <div>
            <svg class="eye left">
                <use xlink:href="#eye">
            </svg>
            <svg class="eye right">
                <use xlink:href="#eye">
            </svg>
            <svg class="mouth">
                <use xlink:href="#mouth">
            </svg>
        </div>
    </label>
    <label class="ok">
        <input type="radio" value="3" name="feedback" />
        <div></div>
    </label>
    <label class="good">
        <input type="radio" value="4" name="feedback"/>
        <div>
            <svg class="eye left">
                <use xlink:href="#eye">
            </svg>
            <svg class="eye right">
                <use xlink:href="#eye">
            </svg>
            <svg class="mouth">
                <use xlink:href="#mouth">
            </svg>
        </div>
    </label>
    <label class="happy">
        <input type="radio" value="5" name="feedback" />
        <div>
            <svg class="eye left">
                <use xlink:href="#eye">
            </svg>
            <svg class="eye right">
                <use xlink:href="#eye">
            </svg>
        </div>
    </label>
</div>
</form>
        
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 4" id="eye">
        <path d="M1,1 C1.83333333,2.16666667 2.66666667,2.75 3.5,2.75 C4.33333333,2.75 5.16666667,2.16666667 6,1"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 7" id="mouth">
        <path d="M1,5.5 C3.66666667,2.5 6.33333333,1 9,1 C11.6666667,1 14.3333333,2.5 17,5.5"></path>
    </symbol>
</svg>
            </div>
          </div>
          <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" id="comment" rows="3"></textarea>
          </div>
          <a type="button" id="doneRate" class="btn btn-success" ><b style="color: white;">Konfirmasi</b></a>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
.feedback {
  --normal: #414052;
  --normal-shadow: #313140;
  --normal-shadow-top: #4c4b60;
  --normal-mouth: #2e2e3d;
  --normal-eye: #282734;
  --active: #f8da69;
  --active-shadow: #f4b555;
  --active-shadow-top: #fff6d3;
  --active-mouth: #f05136;
  --active-eye: #313036;
  --active-tear: #76b5e7;
  --active-shadow-angry: #e94f1d;
  --hover: #454456;
  --hover-shadow-top: #59586b;
  margin: 0;
  padding: 0;
  list-style: none;
  display: flex;
  label {
    position: relative;
    transition: transform 0.3s;
    cursor: pointer;
    &:not(:last-child) {
      margin-right: 20px;
    }
    input {
      appearance: none;
      outline: none;
      border: none;
      display: block;
      position: absolute;
      width: 40px;
      height: 40px;
      left: 0;
      top: 0;
      margin: 0;
      padding: 0;
      border-radius: 50%;
      background: var(--sb, var(--normal));
      box-shadow: inset 3px -3px 4px var(--sh, var(--normal-shadow)),
      inset -1px 1px 2px var(--sht, var(--normal-shadow-top));
      transition: background 0.4s, box-shadow 0.4s, transform 0.3s;
      -webkit-tap-highlight-color: transparent;
    }
    div {
      width: 40px;
      height: 40px;
      position: relative;
      transform: perspective(240px) translateZ(4px);
      svg,
      &:before,
      &:after {
        display: block;
        position: absolute;
        left: var(--l, 9px);
        top: var(--t, 13px);
        width: var(--w, 8px);
        height: var(--h, 1px);
        transform: rotate(var(--r, 0deg)) scale(var(--sc, 1)) translateZ(0);
      }
      svg {
        fill: none;
        stroke: var(--s);
        stroke-width: 1.5px;
        stroke-linecap: round;
        stroke-linejoin: round;
        transition: stroke 0.4s;
        &.eye {
          --s: var(--e, var(--normal-eye));
          --t: 17px;
          --w: 7px;
          --h: 4px;
          &.right {
            --l: 23px;
          }
        }
        &.mouth {
          --s: var(--m, var(--normal-mouth));
          --l: 11px;
          --t: 23px;
          --w: 18px;
          --h: 7px;
        }
      }
      &:before,
      &:after {
        content: "";
        z-index: var(--zi, 1);
        border-radius: var(--br, 1px);
        background: var(--b, var(--e, var(--normal-eye)));
        transition: background 0.4s;
      }
    }
    &.angry {
      --step-1-rx: -24deg;
      --step-1-ry: 20deg;
      --step-2-rx: -24deg;
      --step-2-ry: -20deg;
      div {
        &:before {
          --r: 20deg;
        }
        &:after {
          --l: 23px;
          --r: -20deg;
        }
        svg {
          &.eye {
            stroke-dasharray: 4.55;
            stroke-dashoffset: 8.15;
          }
        }
      }
      input {
        &:checked {
          animation: angry 1s linear;
          & + div {
            &:before {
              --middle-y: -2px;
              --middle-r: 22deg;
              animation: toggle 0.8s linear forwards;
            }
            &:after {
              --middle-y: 1px;
              --middle-r: -18deg;
              animation: toggle 0.8s linear forwards;
            }
          }
        } 
      }
    }
    &.sad {
      --step-1-rx: 20deg;
      --step-1-ry: -12deg;
      --step-2-rx: -18deg;
      --step-2-ry: 14deg;
      div {
        &:before,
        &:after {
          --b: var(--active-tear);
          --sc: 0;
          --w: 5px;
          --h: 5px;
          --t: 15px;
          --br: 50%;
        }
        &:after {
          --l: 25px;
        }
        svg {
          &.eye {
            --t: 16px;
          }
          &.mouth {
            --t: 24px;
            stroke-dasharray: 9.5;
            stroke-dashoffset: 33.25;
          }
        }
      }
      input {
        &:checked {
          & + div {
            &:before,
            &:after {
              animation: tear 0.6s linear forwards;
            }
          }
        } 
      }
    }
    &.ok {
      --step-1-rx: 4deg;
      --step-1-ry: -22deg;
      --step-1-rz: 6deg;
      --step-2-rx: 4deg;
      --step-2-ry: 22deg;
      --step-2-rz: -6deg;
      div {
        &:before {
          --l: 12px;
          --t: 17px;
          --h: 4px;
          --w: 4px;
          --br: 50%;
          box-shadow: 12px 0 0 var(--e, var(--normal-eye));
        }
        &:after {
          --l: 13px;
          --t: 26px;
          --w: 14px;
          --h: 2px;
          --br: 1px;
          --b: var(--m, var(--normal-mouth));
        }
      }
      input {
        &:checked {
          & + div {
            &:before {
              --middle-s-y: 0.35;
              animation: toggle 0.2s linear forwards;
            }
            &:after {
              --middle-s-x: 0.5;
              animation: toggle 0.7s linear forwards;
            }
          }
        } 
      }
    }
    &.good {
      --step-1-rx: -14deg;
      --step-1-rz: 10deg;
      --step-2-rx: 10deg;
      --step-2-rz: -8deg;
      div {
        &:before {
          --b: var(--m, var(--normal-mouth));
          --w: 5px;
          --h: 5px;
          --br: 50%;
          --t: 22px;
          --zi: 0;
          opacity: 0.5;
          box-shadow: 16px 0 0 var(--b);
          filter: blur(2px);
        }
        &:after {
          --sc: 0;
        }
        svg {
          &.eye {
            --t: 15px;
            --sc: -1;
            stroke-dasharray: 4.55;
            stroke-dashoffset: 8.15;
          }
          &.mouth {
            --t: 22px;
            --sc: -1;
            stroke-dasharray: 13.3;
            stroke-dashoffset: 23.75;
          }
        }
      }
      input {
        &:checked {
          & + div {
            svg {
              &.mouth {
                --middle-y: 1px;
                --middle-s: -1;
                animation: toggle 0.8s linear forwards;
              }
            }
          }
        } 
      }
    }
    &.happy {
      div {
        --step-1-rx: 18deg;
        --step-1-ry: 24deg;
        --step-2-rx: 18deg;
        --step-2-ry: -24deg;
        &:before {
          --sc: 0;
        }
        &:after {
          --b: var(--m, var(--normal-mouth));
          --l: 11px;
          --t: 23px;
          --w: 18px;
          --h: 8px;
          --br: 0 0 8px 8px;
        }
        svg {
          &.eye {
            --t: 14px;
            --sc: -1;
          }
        }
      }
      input {
        &:checked {
          & + div {
            &:after {
              --middle-s-x: 0.95;
              --middle-s-y: 0.75;
              animation: toggle 0.8s linear forwards;
            }
          }
        } 
      }
    }
    input {
      &:checked {
        --sb: var(--active);
        --sh: var(--active-shadow);
        --sht: var(--active-shadow-top);
        & + div {
          --m: var(--active-mouth);
          --e: var(--active-eye);
          animation: shake 0.8s linear forwards;
        }
      }
      &:not(:checked) {
        &:hover {
          --sb: var(--hover);
          --sht: var(--hover-shadow-top);
        }
        &:active {
          transform: scale(0.925);
          & + div {
            transform: scale(0.925);
          }
        }
      }
    }
    &:hover {
      transform: scale(1.08);
    }
  }
}

@keyframes shake {
  30% {
    transform: perspective(240px) rotateX(var(--step-1-rx, 0deg))
      rotateY(var(--step-1-ry, 0deg)) rotateZ(var(--step-1-rz, 0deg))
      translateZ(10px);
  }
  60% {
    transform: perspective(240px) rotateX(var(--step-2-rx, 0deg))
      rotateY(var(--step-2-ry, 0deg)) rotateZ(var(--step-2-rz, 0deg))
      translateZ(10px);
  }
  100% {
    transform: perspective(240px) translateZ(4px);
  }
}

@keyframes tear {
  0% {
    opacity: 0;
    transform: translateY(-2px) scale(0) translateZ(0);
  }
  50% {
    transform: translateY(12px) scale(0.6, 1.2) translateZ(0);
  }
  20%,
  80% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    transform: translateY(24px) translateX(4px) rotateZ(-30deg) scale(0.7, 1.1)
      translateZ(0);
  }
}

@keyframes toggle {
  50% {
    transform: translateY(var(--middle-y, 0))
      scale(
        var(--middle-s-x, var(--middle-s, 1)),
        var(--middle-s-y, var(--middle-s, 1))
      )
      rotate(var(--middle-r, 0deg));
  }
}

@keyframes angry {
  40% {
    background: var(--active);
  }
  45% {
    box-shadow: inset 3px -3px 4px var(--active-shadow),
      inset 0 8px 10px var(--active-shadow-angry);
  }
}

html {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
}

* {
    box-sizing: inherit;
    &:before,
    &:after {
        box-sizing: inherit;
    }
}
</style>

<script>

</script>
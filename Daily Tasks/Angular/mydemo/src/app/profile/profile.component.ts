import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {
user:any;
check:boolean=true;
  constructor() { 
   this.user={name:'Timin',
    job:'Software Developer',
   address:'Neykuzhiyil(h) Panamkutty',
   phone:['984739']
  };
  }
clickcheck()
{
  this.check=false;
}
  ngOnInit() {
  }

}

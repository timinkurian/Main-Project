import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BooklistComponent } from './booklist/booklist.component';
import { StudentlistComponent } from './studentlist/studentlist.component';

const routes: Routes = [{path:"booklist",component:BooklistComponent},
{path:"studentlist",component:StudentlistComponent}];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HeadComponent } from './head/head.component';
import { NewsComponent } from './news/news.component';

const routes: Routes = [
{
  path:'links', component: HeadComponent
},
{  path:'news', component: NewsComponent
}];
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

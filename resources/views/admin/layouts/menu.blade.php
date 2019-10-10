<li class="{{Request::is('home') ? 'active' : ''}}">
    <a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Tableau de Bord</span></a>
</li>

<li class="{{
    Request::is('admin/fichier') || Request::is('admin/fichier/*')  ? 'active' : '' ||
    Request::is('admin/fichier-type') || Request::is('admin/fichier-type/*')  ? 'active' : '' ||
    Request::is('admin/qualite') || Request::is('admin/qualite/*')  ? 'active' : '' ||
    Request::is('admin/tag') || Request::is('admin/tag/*')  ? 'active' : ''
}}">
    <a href="#"><i class="fa fa-file-o"></i><span class="nav-label">Fichiers</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="{{route('admin.fichier.index')}}">Listes</a></li>
        <li><a href="{{route('admin.fichier-type.index')}}">Types</a></li>
        <li><a href="{{route('admin.qualite.index')}}">Qualités</a></li>
        <li><a href="{{route('admin.tag.index')}}">Tags</a></li>
    </ul>
</li>

<li class="{{
    Request::is('admin/category') || Request::is('admin/category/*')  ? 'active' : '' ||
    Request::is('admin/sous-category') || Request::is('admin/sous-category/*')  ? 'active' : ''
}}">
    <a href="#"><i class="fa fa-bars"></i><span class="nav-label">Catégories</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="{{route('admin.category.index')}}">Listes</a></li>
        <li><a href="{{route('admin.sous-category.index')}}">Sous-catégories</a></li>
    </ul>
</li>

<li class="{{Request::is('admin/demande') || Request::is('admin/demande/*')  ? 'active' : ''}}">
    <a href="{{route('admin.demande.index')}}"><i class="fa fa-bookmark"></i> <span class="nav-label">Demandes</span> </a>
</li>

<li class="{{
    Request::is('admin/personnel') || Request::is('admin/personnel/*')  ? 'active' : '' ||
    Request::is('admin/fonction') || Request::is('admin/fonctiony/*')  ? 'active' : ''
}}">
    <a href="#"><i class="fa fa-users"></i><span class="nav-label">Personnel</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="{{route('admin.personnel.index')}}">Listes</a></li>
        <li><a href="{{route('admin.fonction.index')}}">Fonctions</a></li>
    </ul>
</li>

<li class="{{
    Request::is('admin/actualite') || Request::is('admin/actualite/*')  ? 'active' : '' ||
    Request::is('admin/aide') || Request::is('admin/aide/*')  ? 'active' : '' ||
    Request::is('admin/langue') || Request::is('admin/langue/*')  ? 'active' : '' ||
    Request::is('admin/page') || Request::is('admin/page/*')  ? 'active' : '' ||
    Request::is('admin/regle-generale') || Request::is('admin/regle-generale/*')  ? 'active' : '' ||
    Request::is('admin/regle-type') || Request::is('admin/regle-type/*')  ? 'active' : '' ||
    Request::is('admin/bug') || Request::is('admin/bug/*')  ? 'active' : '' ||
    Request::is('admin/bug-type') || Request::is('admin/bug-type/*')  ? 'active' : '' ||
    Request::is('admin/bug-resolution') || Request::is('admin/bug-resolution/*')  ? 'active' : '' ||
    Request::is('admin/priorite') || Request::is('admin/priorite/*')  ? 'active' : '' ||
    Request::is('admin/todo') || Request::is('admin/todo/*')  ? 'active' : ''
}}">
    <a href="#"><i class="fa fa-cogs"></i><span class="nav-label">Paramétrage</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="{{route('admin.actualite.index')}}">Actualités</a></li>
        <li><a href="{{route('admin.aide.index')}}">Aides</a></li>
        <li><a href="{{route('admin.langue.index')}}">Langues</a></li>
        <li><a href="{{route('admin.page.index')}}">Pages</a></li>
        <li><a href="{{route('admin.regle-generale.index')}}">Règles générales</a></li>
        <li><a href="{{route('admin.regle-type.index')}}">Type du règles générales</a></li>
        <hr class="specific_hr" width="60">

        <li><a href="{{route('admin.todo.index')}}">Todo</a></li>
        <li><a href="{{route('admin.priorite.index')}}">Priorités</a></li>
        <hr class="specific_hr" width="60">

        <li><a href="{{route('admin.bug.index')}}">Listes des bugs</a></li>
        <li><a href="{{route('admin.bug-resolution.index')}}">Fermer un bug</a></li>
        <li><a href="{{route('admin.bug-type.index')}}">Type de bug</a></li>
    </ul>
</li>

<li class="special_link">
    <a href="{{route('admin.fichier.create')}}"><i class="fa fa-cloud-upload"></i> <span class="nav-label">Ajouter un fichier</span></a>
</li>

<li class="bug_link">
    <a href="{{route('admin.bug.create')}}"><i class="fa fa-bug"></i> <span class="nav-label">Reporter un bug</span></a>
</li>
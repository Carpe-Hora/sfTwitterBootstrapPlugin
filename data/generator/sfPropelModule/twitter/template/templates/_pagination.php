<div class="pagination fRight mts">
    <ul>
      <li class="prev [?php if (1 == $pager->getPage()): ?]disabled[?php endif; ?]">
        <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">
           ← First
        </a>
      </li>

    <li class="prev [?php if (1 == $pager->getPage()): ?]disabled[?php endif; ?]">
      <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">
        ← Previous
      </a>
    </li>

      [?php foreach ($pager->getLinks() as $page): ?]
        [?php if ($page == $pager->getPage()): ?]
          <li class="active"><a href="#">[?php echo $page ?]</a></li>
        [?php else: ?]
          <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a></li>
        [?php endif; ?]
      [?php endforeach; ?]

      <li class="next [?php if ($pager->getLastPage() == $pager->getPage()): ?]disabled[?php endif; ?]"><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">
        Next →
      </a></li>

      <li class="next [?php if ($pager->getLastPage() == $pager->getPage()): ?]disabled[?php endif; ?]">
      <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">
        Last →
      </a>
      </li>
    </ul>
</div>
